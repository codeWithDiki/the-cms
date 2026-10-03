<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="space-y-3 py-20 px-4">
    <livewire:post.grid-component max_posts="9" :is_paginated="true" />
</div>