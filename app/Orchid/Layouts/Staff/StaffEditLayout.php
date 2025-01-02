<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Staff;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class StaffEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('user.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),
                Input::make('user.type')
                ->type('hidden')
                ->value('3'),

            Input::make('user.email')
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),

            Input::make('user.mobile_number')
                ->type('text')
                ->max(12)
                ->required()
                ->title('Mobile Number')
                ->placeholder('Mobile Number'),

            Input::make('user.emp_number')
                ->type('text')
                ->max(12)
                ->required()
                ->title('Employee Number')
                ->placeholder('Employee Number'),

            Input::make('user.post')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Position')
                ->placeholder('Position'),

            Input::make('user.monthly_salary')
                ->type('number')
                ->required()
                ->title('Monthly Salary')
                ->placeholder('Monthly Salary'),

            Input::make('user.address')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Address')
                ->placeholder('Address'),

            Input::make('user.dob')
                ->type('date')
                ->required()
                ->title('Date of Birth')
                ->placeholder('Date of Birth'),

            Select::make('user.gender')
                ->type('select')
                ->required()
                ->title('Gender')
                ->placeholder('Gender')
                ->options([
                    'Male' => 'Male',
                    'Female' => 'Female',
                ]),

            Input::make('user.nationality')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Nationality')
                ->placeholder('Nationality'),

            Select::make('user.marital_status')
                ->type('select')
                ->required()
                ->title('Marital Status')
                ->placeholder('Marital Status')
                ->options([
                    'Single' => 'Single',
                    'Married' => 'Married',
                ]),

            Input::make('user.religion')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Religion')
                ->placeholder('Religion'),

                
        ];
    }
}
