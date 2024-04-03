<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Blog extends Component
{
    public $isOpen = false;
    public $colorList = ["purple", "indigo", "sky", "teal", "emerald", "amber", "orange", "red", "pink", "fuchsia", "zinc"];
    public $tagList = [];
    public $newName = '';
    public $currentIndex;

    public function addNameToList()
    {
        if (!empty($this->newName)) {
            $rand = $this->colorList[rand(0, count($this->colorList) - 1)];
            $this->tagList[] = [
                'name' => strlen($this->newName) > 26 ? substr($this->newName, 0, 23) . '...' : $this->newName,
                'color' => $rand,
                'isOpen' => false
            ];
            $this->newName = '';
        }
    }

    public function removeTag($index)
    {
        unset($this->tagList[$index]);
        $this->tagList = array_values($this->tagList);
    }

    public function showIcon()
    {
        $this->isOpen = true;
    }

    public function hideIcon()
    {
        $this->isOpen = false;
    }

    public function toggleIcon($index)
    {
        $this->currentIndex = $index === $this->currentIndex ? null : $index;
    }
    public function render()
    {
        return view('livewire.blog');
    }
}
