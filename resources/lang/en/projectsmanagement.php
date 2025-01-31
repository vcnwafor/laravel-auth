<?php

return [

    // Titles
    'showing-all-projects'     => 'Showing All Projects',
    'projects-menu-alt'        => 'Show Projects Management Menu',
    'create-new-project'       => 'Create New Project',
    'show-deleted-projects'    => 'Show Deleted Project',
    'editing-project'          => 'Editing Project :name',
    'showing-project'          => 'Showing Project :name',
    'showing-project-title'    => ':name\'s Information',

    // Flash Messages
    'createSuccess'   => 'Successfully created project! ',
    'updateSuccess'   => 'Successfully updated project! ',
    'deleteSuccess'   => 'Successfully deleted project! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show Project Tab
    'viewProfile'            => 'View Profile',
    'editProject'               => 'Edit Project',
    'deleteProject'             => 'Delete Project',
    'projectsBackBtn'           => 'Back to Projects',
    'projectsPanelTitle'        => 'Project Information',
    'labelProjectName'          => 'Projectname:',
    'labelEmail'             => 'Email:',
    'labelFirstName'         => 'First Name:',
    'labelLastName'          => 'Last Name:',
    'labelRole'              => 'Role:',
    'labelStatus'            => 'Status:',
    'labelAccessLevel'       => 'Access',
    'labelPermissions'       => 'Permissions:',
    'labelStart'       => 'Started on:',
    'labelDescription'       => 'Description:',
    'labelClient'       => 'Client:',
    'labelApprovedamount'       => 'Amount:',
    'labelStatus'       => 'Status:',
    'labelCompletion'       => 'Completed on:',
    'labelName'       => 'Name:',
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
    'projectsDeletedPanelTitle' => 'Deleted Project Information',
    'projectsBackDelBtn'        => 'Back to Deleted Projects',

    'successRestore'    => 'Project successfully restored.',
    'successDestroy'    => 'Project record successfully destroyed.',
    'errorProjectNotFound' => 'Project not found.',

    'labelProjectLevel'  => 'Level',
    'labelProjectLevels' => 'Levels',

    'projects-table' => [
        'caption'   => '{1} :projectscount project total|[2,*] :projectscount total projects',
        'id'        => 'ID',
        'name'      => 'Name',
        'fname'     => 'First Name',
        'lname'     => 'Last Name',
        'email'     => 'Email',
        'startdate'     => 'Start Date',
        'completiondate'     => 'Completion Date',
        'description'     => 'Description',
        'client'     => 'Client',
        'amount'     => 'Amount',
        'status'     => 'Status',
        'role'      => 'Role',
        'created'   => 'Created',
        'updated'   => 'Updated',
        'actions'   => 'Actions',
        'updated'   => 'Updated',
    ],

    'buttons' => [
        'create-new'    => 'New Project',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> Project</span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> Project</span>',
        'report'        => '<i class="fa fa-file fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> Reports</span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> Project</span>',
        'back-to-projects' => '<span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">Projects</span>',
        'back-to-project'  => 'Back  <span class="hidden-xs">to Project</span>',
        'delete-project'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> Project</span>',
        'edit-project'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> Project</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New Project',
        'back-projects'    => 'Back to projects',
        'email-project'    => 'Email :project',
        'submit-search' => 'Submit Projects Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'projectNameTaken'          => 'Projectname is taken',
        'projectNameRequired'       => 'Projectname is required',
        'fNameRequired'          => 'First Name is required',
        'lNameRequired'          => 'Last Name is required',
        'emailRequired'          => 'Email is required',
        'emailInvalid'           => 'Email is invalid',
        'passwordRequired'       => 'Password is required',
        'PasswordMin'            => 'Password needs to have at least 6 characters',
        'PasswordMax'            => 'Password maximum length is 20 characters',
        'captchaRequire'         => 'Captcha is required',
        'CaptchaWrong'           => 'Wrong captcha, please try again.',
        'roleRequired'           => 'Project role is required.',
        'project-creation-success'  => 'Successfully created project!',
        'update-project-success'    => 'Successfully updated project!',
        'delete-success'         => 'Successfully deleted the project!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-project' => [
        'id'                => 'Project ID',
        'name'              => 'Projectname',
        'email'             => '<span class="hidden-xs">Project </span>Email',
        'role'              => 'Project Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'Project Role',
        'labelAccessLevel'  => '<span class="hidden-xs">Project</span> Access Level|<span class="hidden-xs">Project</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Showing Search Results',
        'found-footer'      => ' Record(s) found',
        'no-results'        => 'No Results',
        'search-projects-ph'   => 'Search Projects',
    ],

    'modals' => [
        'delete_project_message' => 'Are you sure you want to delete :project?',
    ],
];
