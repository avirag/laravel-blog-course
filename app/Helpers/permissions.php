<?php

function check_user_permissions($request, $actionName = null, $id = null) {
    $currentUser = $request->user();

    if($actionName) {
        $currentActionName = $actionName;
    } else {
        $currentActionName = $request->route()->getActionName();
    }

    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

    $crudPermissionsMap = [
//            'create' => ['create', 'store'],
//            'update' => ['edit', 'update'],
//            'delete' => ['destroy', 'store', 'forceDestroy'],
//            'read' => ['index', 'view'],
        'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
    ];

    $classesMap = [
        'Blog' => 'post',
        'Categories' => 'category',
        'Users' => 'user'
    ];

    foreach ($crudPermissionsMap as $permission => $methods) {
        if(in_array($method, $methods) && isset($classesMap[$controller])) {
            $className = $classesMap[$controller];

            // if the current user has not update-others-post/delete-others-post permission
            if($className == 'post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy' ])) {
                $id = !is_null($id) ? $id : $request->route('blog');

                // make sure only modify own post
                if($id && !$currentUser->can('update-others-post') && !$currentUser->can('delete-others-post')) {
                    $post = \App\Post::withTrashed()->find($id);
                    if ($post->author_id !== $currentUser->id) {
                        return false;
                    }
                }
            }
            // if the user has not permission don't allow next request
            elseif(!$currentUser->can("{$permission}-{$className}")) {
                return false;
            }
            break;
        }
    }

    return true;
}