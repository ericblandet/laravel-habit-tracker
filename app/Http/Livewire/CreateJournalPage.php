<?php

namespace App\Http\Livewire;

use Filament\Forms;
use Livewire\Component;
use App\Models\JournalPage;
use App\Models\SportLevel;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class CreateJournalPage extends Component implements HasForms
{
    use InteractsWithForms;

    public $date;
    public $user_id;
    public $sport_level;
    public $main_focus;
    public $meal_1;
    public $meal_2;
    public $meal_3;
    public $work_on_side_project;
    public $video_games;
    public $meditation;

    public JournalPage $journalPage;

    public function mount(): void
    {
        // $this->form->fill([
        //     'title' => $this->post->title,
        //     'content' => $this->post->content,
        // ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\DatePicker::make('date'),
            Forms\Components\TextInput::make('user_id'),
            Select::make('sport_level_id')
                ->label('SportLevel')
                ->options(SportLevel::all()->pluck('tk_name', 'id'))
                ->searchable(),
            Forms\Components\MarkdownEditor::make('main_focus'),
            Forms\Components\TextInput::make('meal_1'),
            Forms\Components\TextInput::make('meal_2'),
            Forms\Components\TextInput::make('meal_3'),
            Forms\Components\Checkbox::make('work_on_side_project'),
            Forms\Components\Checkbox::make('video_games'),
            Forms\Components\Checkbox::make('meditation')
        ];
    }

    public function submit(): void
    {
    }


    public function render()
    {
        return view('livewire.create-journal-page');
    }
}
