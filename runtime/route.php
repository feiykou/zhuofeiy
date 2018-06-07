<?php 
return array (
  'get' => 
  array (
    'captcha/[:id]' => 
    array (
      'rule' => 'captcha/[:id]',
      'route' => '\think\captcha\CaptchaController@index',
      'var' => 
      array (
        'id' => 2,
      ),
      'option' => 
      array (
      ),
      'pattern' => 
      array (
      ),
    ),
    '/' => 
    array (
      'rule' => '/',
      'route' => 'admin/index/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'index' => 
    array (
      'rule' => 'index',
      'route' => 'admin/index/main',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'artlist' => 
    array (
      'rule' => 'artlist',
      'route' => 'admin/article/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'artcon' => 
    array (
      'rule' => 'artcon',
      'route' => 'admin/article/add',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'cate' => 
    array (
      'rule' => 'cate',
      'route' => 'admin/cate/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'user' => 
    array (
      'rule' => 'user',
      'route' => 'admin/user/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'role' => 
    array (
      'rule' => 'role',
      'route' => 'admin/role/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'rule' => 
    array (
      'rule' => 'rule',
      'route' => 'admin/auth_rule/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'product' => 
    array (
      'rule' => 'product',
      'route' => 'admin/product/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'proAdd' => 
    array (
      'rule' => 'proAdd',
      'route' => 'admin/product/add',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'bannerItem' => 
    array (
      'rule' => 'bannerItem',
      'route' => 'admin/banner_item/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'bannerItemAdd' => 
    array (
      'rule' => 'bannerItemAdd',
      'route' => 'admin/banner_item/add',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'login' => 
    array (
      'rule' => 'login',
      'route' => 'admin/login/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'uploader' => 
    array (
      'rule' => 'uploader',
      'route' => 'admin/webuploader/img',
      'var' => 
      array (
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/banner/:id' => 
    array (
      'rule' => 'api/:version/banner/:id',
      'route' => 'api/:version.Banner/getBanner',
      'var' => 
      array (
        'version' => 1,
        'id' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/article' => 
    array (
      'rule' => 'api/:version/article',
      'route' => 'api/:version.Article/getArticle',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/article/:id' => 
    array (
      'rule' => 'api/:version/article/:id',
      'route' => 'api/:version.Article/getArticleById',
      'var' => 
      array (
        'version' => 1,
        'id' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/theme' => 
    array (
      'rule' => 'api/:version/theme',
      'route' => 'api/:version.Theme/getSimpleList',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/theme/:id' => 
    array (
      'rule' => 'api/:version/theme/:id',
      'route' => 'api/:version.Theme/getComplexOne',
      'var' => 
      array (
        'version' => 1,
        'id' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/product/recent' => 
    array (
      'rule' => 'api/:version/product/recent',
      'route' => 'api/:version.Product/getRecent',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/product/by_cate' => 
    array (
      'rule' => 'api/:version/product/by_cate',
      'route' => 'api/:version.Product/getAllInCate',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/product/:id' => 
    array (
      'rule' => 'api/:version/product/:id',
      'route' => 'api/:version.Product/getOne',
      'var' => 
      array (
        'version' => 1,
        'id' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
        'id' => '\d+',
      ),
    ),
    'api/:version/cate/all' => 
    array (
      'rule' => 'api/:version/cate/all',
      'route' => 'api/:version.Cate/getAllCategories',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/order/:id' => 
    array (
      'rule' => 'api/:version/order/:id',
      'route' => 'api/:version.Order/getDetail',
      'var' => 
      array (
        'version' => 1,
        'id' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
        'id' => '\d+',
      ),
    ),
    'api/:version/order/by_user' => 
    array (
      'rule' => 'api/:version/order/by_user',
      'route' => 'api/:version.Order/getSummaryByUser',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
  ),
  'post' => 
  array (
    'api/:version/token/user' => 
    array (
      'rule' => 'api/:version/token/user',
      'route' => 'api/:version.Token/getToken',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/token/verify' => 
    array (
      'rule' => 'api/:version/token/verify',
      'route' => 'api/:version.Token/verifyToken',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/address' => 
    array (
      'rule' => 'api/:version/address',
      'route' => 'api/:version.Address/createOrUpdateAddress',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/order' => 
    array (
      'rule' => 'api/:version/order',
      'route' => 'api/:version.Order/placeOrder',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/pay/pre_order' => 
    array (
      'rule' => 'api/:version/pay/pre_order',
      'route' => 'api/:version.Pay/getPreOrder',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
    'api/:version/pay/notify' => 
    array (
      'rule' => 'api/:version/pay/notify',
      'route' => 'api/:version.Pay/receiveNotify',
      'var' => 
      array (
        'version' => 1,
      ),
      'option' => 
      array (
        'complete_match' => true,
      ),
      'pattern' => 
      array (
      ),
    ),
  ),
  'put' => 
  array (
  ),
  'delete' => 
  array (
  ),
  'patch' => 
  array (
  ),
  'head' => 
  array (
  ),
  'options' => 
  array (
  ),
  '*' => 
  array (
  ),
  'alias' => 
  array (
  ),
  'domain' => 
  array (
  ),
  'pattern' => 
  array (
  ),
  'name' => 
  array (
    '\think\captcha\captchacontroller@index' => 
    array (
      0 => 
      array (
        0 => 'captcha/[:id]',
        1 => 
        array (
          'id' => 2,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/index/index' => 
    array (
      0 => 
      array (
        0 => '/',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/index/main' => 
    array (
      0 => 
      array (
        0 => 'index',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/article/index' => 
    array (
      0 => 
      array (
        0 => 'artlist',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/article/add' => 
    array (
      0 => 
      array (
        0 => 'artcon',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/cate/index' => 
    array (
      0 => 
      array (
        0 => 'cate',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/user/index' => 
    array (
      0 => 
      array (
        0 => 'user',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/role/index' => 
    array (
      0 => 
      array (
        0 => 'role',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/auth_rule/index' => 
    array (
      0 => 
      array (
        0 => 'rule',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/product/index' => 
    array (
      0 => 
      array (
        0 => 'product',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/product/add' => 
    array (
      0 => 
      array (
        0 => 'proAdd',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/banner_item/index' => 
    array (
      0 => 
      array (
        0 => 'bannerItem',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/banner_item/add' => 
    array (
      0 => 
      array (
        0 => 'bannerItemAdd',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/login/index' => 
    array (
      0 => 
      array (
        0 => 'login',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'admin/webuploader/img' => 
    array (
      0 => 
      array (
        0 => 'uploader',
        1 => 
        array (
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.banner/getbanner' => 
    array (
      0 => 
      array (
        0 => 'api/:version/banner/:id',
        1 => 
        array (
          'version' => 1,
          'id' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.article/getarticle' => 
    array (
      0 => 
      array (
        0 => 'api/:version/article',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.article/getarticlebyid' => 
    array (
      0 => 
      array (
        0 => 'api/:version/article/:id',
        1 => 
        array (
          'version' => 1,
          'id' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.theme/getsimplelist' => 
    array (
      0 => 
      array (
        0 => 'api/:version/theme',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.theme/getcomplexone' => 
    array (
      0 => 
      array (
        0 => 'api/:version/theme/:id',
        1 => 
        array (
          'version' => 1,
          'id' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.product/getrecent' => 
    array (
      0 => 
      array (
        0 => 'api/:version/product/recent',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.product/getallincate' => 
    array (
      0 => 
      array (
        0 => 'api/:version/product/by_cate',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.product/getone' => 
    array (
      0 => 
      array (
        0 => 'api/:version/product/:id',
        1 => 
        array (
          'version' => 1,
          'id' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.cate/getallcategories' => 
    array (
      0 => 
      array (
        0 => 'api/:version/cate/all',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.token/gettoken' => 
    array (
      0 => 
      array (
        0 => 'api/:version/token/user',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.token/verifytoken' => 
    array (
      0 => 
      array (
        0 => 'api/:version/token/verify',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.address/createorupdateaddress' => 
    array (
      0 => 
      array (
        0 => 'api/:version/address',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.order/placeorder' => 
    array (
      0 => 
      array (
        0 => 'api/:version/order',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.order/getdetail' => 
    array (
      0 => 
      array (
        0 => 'api/:version/order/:id',
        1 => 
        array (
          'version' => 1,
          'id' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.order/getsummarybyuser' => 
    array (
      0 => 
      array (
        0 => 'api/:version/order/by_user',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.pay/getpreorder' => 
    array (
      0 => 
      array (
        0 => 'api/:version/pay/pre_order',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
    'api/:version.pay/receivenotify' => 
    array (
      0 => 
      array (
        0 => 'api/:version/pay/notify',
        1 => 
        array (
          'version' => 1,
        ),
        2 => NULL,
        3 => NULL,
      ),
    ),
  ),
);