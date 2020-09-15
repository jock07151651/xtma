<?php
declare (strict_types = 1);

namespace app;

use app\index\model\Category as CategoryModel;
use catetree\Catetree;
use think\App;
use think\exception\ValidateException;
use think\Validate;

/**
 * 控制器基础类
 */
abstract class BaseController
{
    public $cateFive;       // nav导航栏
    public $categoryRes;    // 顶级和二级栏目
    /**
     * Request实例
     * @var \think\Request
     */
    protected $request;

    /**
     * 应用实例
     * @var \think\App
     */
    protected $app;

    /**
     * 是否批量验证
     * @var bool
     */
    protected $batchValidate = false;

    /**
     * 控制器中间件
     * @var array
     */
    protected $middleware = [];

    /**
     * 构造方法
     * @access public
     * @param  App  $app  应用对象
     */
    public function __construct(App $app)
    {
        $this->app     = $app;
        $this->request = $this->app->request;

        // 控制器初始化
        $this->initialize();
    }

    // 初始化
    protected function initialize() {
        $this->_getCateFive();
    }

    /**
     * 验证数据
     * @access protected
     * @param  array        $data     数据
     * @param  string|array $validate 验证器名或者验证规则数组
     * @param  array        $message  提示信息
     * @param  bool         $batch    是否批量验证
     * @return array|string|true
     * @throws ValidateException
     */
    protected function validate(array $data, $validate, array $message = [], bool $batch = false)
    {
        if (is_array($validate)) {
            $v = new Validate();
            $v->rule($validate);
        } else {
            if (strpos($validate, '.')) {
                // 支持场景
                [$validate, $scene] = explode('.', $validate);
            }
            $class = false !== strpos($validate, '\\') ? $validate : $this->app->parseClass('validate', $validate);
            $v     = new $class();
            if (!empty($scene)) {
                $v->scene($scene);
            }
        }

        $v->message($message);

        // 是否批量验证
        if ($batch || $this->batchValidate) {
            $v->batch(true);
        }

        return $v->failException(true)->check($data);
    }

    // 前台
    public function _getCateFive() {
        $category = new CategoryModel();

        // 获取顶级和二级栏目
        $categoryRes = $category->getCates();

        // 无限级分类
        // $cateTree = new Catetree();
        // $categoryResList = $category->getCategoryList();
        // $categoryList = $cateTree->catetree($categoryResList);

        // nav导航显示5条分类
        $cateFive = $category->getIndexCateFive();

        $this->cateFive = $cateFive;
        $this->categoryRes = $categoryRes;
    }

}
