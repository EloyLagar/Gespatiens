<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFinalReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'psycho_diagnosis' => 'sometimes|string',
            'NIP' => 'sometimes|string',
            'psycho_evaluation' => 'sometimes|string',
            'partners_relationships' => 'sometimes|string',
            'family_relationship' => 'sometimes|string',
            'about_families' => 'sometimes|string',
            'dealing_with_employees' => 'sometimes|string',
            'social_diagnosis' => 'sometimes|string',
            'social_familiar_situation' => 'sometimes|string',
            'judicial_situation' => 'sometimes|string',
            'toxicological_controls' => 'sometimes|string',
            'adaptation_and_implication' => 'sometimes|string',
            'life_general_situation' => 'sometimes|string',
            'motivation' => 'sometimes|string',
            'date' => 'sometimes|string',
            'request_number' => 'sometimes|string',
            'initial_health' => 'sometimes|string',
            'psychological' => 'sometimes|string',
            'evaluation' => 'sometimes|string',
            'educational_therapeutic_outgoings' => 'sometimes|string',
            'leaving_date' => 'sometimes|string',
            'leaving_reason' => 'sometimes|string',
            'psycho_therapeutic_outgoings' => 'sometimes|string',
            'psycho_intervention_objectives' => 'sometimes|string',
            'discharge_psycho_situation' => 'sometimes|string',
            'health_evolution' => 'sometimes|string',
            'evolution_and_objectives_achieved' => 'sometimes|string',
            'discharge_medical_situation' => 'sometimes|string',
            'other_medical_care' => 'sometimes|string',
            'after_program_objectives' => 'sometimes|string',
            'toxicological_summary' => 'sometimes|string',
            'discharge_family_situation' => 'sometimes|string',
        ];
    }

    public function messages()
{
    return [
        'psycho_diagnosis.string' =>'string',
        'NIP.string' =>'string',
        'psycho_evaluation.string' =>'string',
        'partners_relationships.string' =>'string',
        'family_relationship.string' =>'string',
        'about_families.string' =>'string',
        'dealing_with_employees.string' =>'string',
        'social_diagnosis.string' =>'string',
        'social_familiar_situation.string' =>'string',
        'judicial_situation.string' =>'string',
        'toxicological_controls.string' =>'string',
        'adaptation_and_implication.string' =>'string',
        'life_general_situation.string' =>'string',
        'motivation.string' =>'string',
        'date.string' =>'string',
        'request_number.string' =>'string',
        'initial_health.string' =>'string',
        'psychological.string' =>'string',
        'evaluation.string' =>'string',
        'educational_therapeutic_outgoings.string' =>'string',
        'leaving_date.string' =>'string',
        'leaving_reason.string' =>'string',
        'psycho_therapeutic_outgoings.string' =>'string',
        'psycho_intervention_objectives.string' =>'string',
        'discharge_psycho_situation.string' =>'string',
        'health_evolution.string' =>'string',
        'evolution_and_objectives_achieved.string' =>'string',
        'discharge_medical_situation.string' =>'string',
        'other_medical_care.string' =>'string',
        'after_program_objectives.string' =>'string',
        'toxicological_summary.string' =>'string',
        'discharge_family_situation.string' =>'string',
    ];
}

}
