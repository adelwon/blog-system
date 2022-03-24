<?php

return [
    'general'=>[
        'add' => 'Successfully added!;)',
        'update' => 'Successfully updated!;)',
        'delete' => 'Successfully deleted!'
    ],
    'category' =>[
        'cannot_delete' => 'Cannot delete a parent category!',
        'cannot_delete_with_posts' => 'You cannot delete a category that contains posts!'
    ],
    'tag' =>[
        'cannot_delete_with_posts' => 'It is not possible to delete the tag because it is attached to the post.',
    ],
    'user' =>[
        'cannot_delete_with_posts' => 'The user cannot be deleted because he has posts. You can ban the user!:)',
    ]
];
