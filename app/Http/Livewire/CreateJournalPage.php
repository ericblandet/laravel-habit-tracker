<?php

namespace App\Http\Livewire;

use Filament\Forms;
use App\Models\User;
use Livewire\Component;
use App\Models\SportLevel;
use App\Models\JournalPage;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;

class CreateJournalPage extends Component implements HasForms
{
    use InteractsWithForms;

    public $date;
    public $user_id;
    public $sport_level_id;
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
        $this->form->fill([
            'date' => now(),
            'user_id' => 1
        ]);
    }

    protected function getFormModel(): string
    {
        return JournalPage::class;
    }

    protected function getFormSchema(): array
    {
        return [
            Fieldset::make('Page')->schema([
                DatePicker::make('date')
                    ->displayFormat('d.m.Y')
                    ->required(),
                Select::make('user_id')
                    ->label('Who are you?')
                    ->relationship('user', 'name')
                    ->required(),
            ]),

            Select::make('sport_level_id')
                ->label('SportLevel')
                ->relationship('sportLevel', 'tk_name')
                ->required(),

            Forms\Components\MarkdownEditor::make('main_focus')
                ->label('What was your main focus today ?')
                ->placeholder('What was your main focus today ?')
                ->required(),

            Fieldset::make('Meals')->schema([
                Forms\Components\TextInput::make('meal_1')->required(),
                Forms\Components\TextInput::make('meal_2'),
                Forms\Components\TextInput::make('meal_3'),
            ])
                ->columns(1),

            Fieldset::make('Side-activities')->schema([
                Forms\Components\Checkbox::make('work_on_side_project'),
                Forms\Components\Checkbox::make('video_games'),
                Forms\Components\Checkbox::make('meditation')
            ])->columns(3),
        ];
    }

    public function submit(): void
    {
        $this->journalPage = JournalPage::create($this->form->getState());
        redirect()->route('todayWrite');
        // redirect('/');
    }

    public function render()
    {
        return view('livewire.create-journal-page');
    }
}
