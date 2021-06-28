<?php

return [

    // Titles
    'showing-all-assets'     => 'Showing All Assets',
    'assets-menu-alt'        => 'Show Assets Management Menu',
    'create-new-asset'       => 'Create New Asset',
    'show-deleted-assets'    => 'Show Deleted Asset',
    'editing-asset'          => 'Editing Asset :name',
    'showing-asset'          => 'Showing Asset :name',
    'showing-asset-title'    => ':name\'s Information',

    // Flash Messages
    'createSuccess'   => 'Successfully created asset! ',
    'updateSuccess'   => 'Successfully updated asset! ',
    'deleteSuccess'   => 'Successfully deleted asset! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show Asset Tab
    'viewProfile'            => 'View Profile',
    'editAsset'               => 'Edit Asset',
    'deleteAsset'             => 'Delete Asset',
    'assetsBackBtn'           => 'Back to Assets',
    'assetsPanelTitle'        => 'Asset Information',
    'labelAssetName'          => 'Name:',
    'labelEmail'             => 'Email:',
    'labelName'              => 'Name:',
    'labelDescription'       => 'Description',
    'labelLocation'          => 'Location',
    'labelImage'              => 'Image:',
    'labelStatus'            => 'Status:',
    'labelAccessLevel'       => 'Access',
    'labelPermissions'       => 'Permissions:',
    'labelCreatedAt'         => 'Created At:',
    'labelUpdatedAt'         => 'Updated At:',
    'labelIpEmail'           => 'Email Signup IP:',
    'labelIpEmail'           => 'Email Signup IP:',
    'labelIpConfirm'         => 'Confirmation IP:',
    'labelIpSocial'          => 'Socialite Signup IP:',
    'labelIpAdmin'           => 'Admin Signup IP:',
    'labelIpUpdate'          => 'Last Update IP:',
    'labelDeletedAt'         => 'Deleted on',
    'labelIpDeleted'         => 'Deleted IP:',
    'assetsDeletedPanelTitle' => 'Deleted Asset Information',
    'assetsBackDelBtn'        => 'Back to Deleted Assets',

    'successRestore'    => 'Asset successfully restored.',
    'successDestroy'    => 'Asset record successfully destroyed.',
    'errorAssetNotFound' => 'Asset not found.',

    'labelAssetLevel'  => 'Level',
    'labelAssetLevels' => 'Levels',

    'assets-table' => [
        'caption'   => '{1} :assetscount asset total|[2,*] :assetscount total assets',
        'id'        => 'ID',
        'name'      => 'Name',
        'description' => 'Description',
        'image'     => 'Image',
        'location'  => 'Location',
        'email'     => 'Email',
        'role'      => 'Role',
        'created'   => 'Created',
        'updated'   => 'Updated',
        'actions'   => 'Actions',
        'updated'   => 'Updated',
    ],

    'buttons' => [
        'create-new'    => 'New Asset',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> Asset</span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> Asset</span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> Asset</span>',
        'back-to-assets' => '<span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">Assets</span>',
        'back-to-asset'  => 'Back  <span class="hidden-xs">to Asset</span>',
        'delete-asset'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> Asset</span>',
        'edit-asset'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> Asset</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New Asset',
        'back-assets'    => 'Back to assets',
        'email-asset'    => 'Email :asset',
        'submit-search' => 'Submit Assets Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'assetNameTaken'          => 'Assetname is taken',
        'assetNameRequired'       => 'Assetname is required',
        'fNameRequired'          => 'First Name is required',
        'lNameRequired'          => 'Last Name is required',
        'emailRequired'          => 'Email is required',
        'emailInvalid'           => 'Email is invalid',
        'passwordRequired'       => 'Password is required',
        'PasswordMin'            => 'Password needs to have at least 6 characters',
        'PasswordMax'            => 'Password maximum length is 20 characters',
        'captchaRequire'         => 'Captcha is required',
        'CaptchaWrong'           => 'Wrong captcha, please try again.',
        'roleRequired'           => 'Asset role is required.',
        'asset-creation-success'  => 'Successfully created asset!',
        'update-asset-success'    => 'Successfully updated asset!',
        'delete-success'         => 'Successfully deleted the asset!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-asset' => [
        'id'                => 'Asset ID',
        'name'              => 'Assetname',
        'email'             => '<span class="hidden-xs">Asset </span>Email',
        'role'              => 'Asset Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'Asset Role',
        'labelAccessLevel'  => '<span class="hidden-xs">Asset</span> Access Level|<span class="hidden-xs">Asset</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Showing Search Results',
        'found-footer'      => ' Record(s) found',
        'no-results'        => 'No Results',
        'search-assets-ph'   => 'Search Assets',
    ],

    'modals' => [
        'delete_asset_message' => 'Are you sure you want to delete :asset?',
    ],
];
