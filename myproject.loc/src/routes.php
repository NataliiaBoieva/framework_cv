<?php

return [
'~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
'~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
'~^articles/(\d+)/comment$~' => [\MyProject\Controllers\ArticlesController::class, 'addComment'],
'~^comment/(\d+)/editcomment$~' => [\MyProject\Controllers\ArticlesController::class, 'editComment'],
 '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
 '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
 '~^users/login~' => [\MyProject\Controllers\UsersController::class, 'login'],
 '~^users/logout~' => [\MyProject\Controllers\UsersController::class, 'logout'],
 '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
'~^hello/(.*)$~'=> [\MyProject\Controllers\MainController::class, 'sayHello'],
'~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
'~^bye/(.*)$~'=> [\MyProject\Controllers\MainController::class, 'sayBye'],

];