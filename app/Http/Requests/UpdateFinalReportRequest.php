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
        'reference_familiars' => 'sometimes|string',
        'familiar_evo_and_realtionship' => 'sometimes|string',
        'habit_adaptation' => 'sometimes|string',
        'activities_adaptation' => 'sometimes|string',
        'normativity_adaptation' => 'sometimes|string',
        'workout_adaptation' => 'sometimes|string',
        'leisure_adaptation' => 'sometimes|string',
        'partners_relationship' => 'sometimes|string',
        'therapeutic_crew_relationship' => 'sometimes|string',
        'psycho_entry_valoration' => 'sometimes|string',
        'psycho_evaluation_with_instruments' => 'sometimes|string',
        'about_motivation' => 'sometimes|string',
        'psycho_interventions' => 'sometimes|string',
        'psycho_diagnosis' => 'sometimes|string',
        'social_familiar_situation' => 'sometimes|string',
        'laboral_educative_economical_situation' => 'sometimes|string',
        'judicial_situation' => 'sometimes|string',
        'social_evo_and_objectives' => 'sometimes|string',
        'social_diagnosis' => 'sometimes|string',
        'health_at_entry' => 'sometimes|string',
        'about_toxicology' => 'sometimes|string',
        'toxicological_controls' => 'sometimes|string',
        'health_diagnosis' => 'sometimes|string',
        'physical_health_condition' => 'sometimes|string',
        'request_number' => 'sometimes|string',
        'health_situation_at_discharge' => 'sometimes|string',
        'other_medical_attention' => 'sometimes|string',
        'familiar_situation_at_discharge' => 'sometimes|string',
        'discharge_fundamentals' => 'sometimes|string',
        'after_discharge_objectives' => 'sometimes|string',
        'educative_outgoings_value' => 'sometimes|string',
        'psycho_situation_at_discharge' => 'sometimes|string',
        'psycho_outgoings_value' => 'sometimes|string',
        ];
    }

    public function messages()
{
    return [
        'reference_familiars' => 'string',
        'familiar_evo_and_realtionship' => 'string',
        'habit_adaptation' => 'string',
        'activities_adaptation' => 'string',
        'normativity_adaptation' => 'string',
        'workout_adaptation' => 'string',
        'leisure_adaptation' => 'string',
        'partners_relationship' => 'string',
        'therapeutic_crew_relationship' => 'string',
        'psycho_entry_valoration' => 'string',
        'psycho_evaluation_with_instruments' => 'string',
        'about_motivation' => 'string',
        'psycho_interventions' => 'string',
        'pyscho_diagnosis' => 'string',
        'social_familiar_situation' => 'string',
        'laboral_educative_economical_situation' => 'string',
        'judicial_situation' => 'string',
        'social_evo_and_objectives' => 'string',
        'social_diagnosis' => 'string',
        'health_at_entry' => 'string',
        'about_toxicology' => 'string',
        'toxicological_controls' => 'string',
        'health_diagnosis' => 'string',
        'physical_health_condition' => 'string',
        'state' => 'string',
        'request_number' => 'string',
        'health_situation_at_discharge' => 'string',
        'other_medical_attention' => 'string',
        'familiar_situation_at_discharge' => 'string',
        'discharge_fundamentals' => 'string',
        'after_discharge_objectives' => 'string',
        'educative_outgoings_value' => 'string',
        'psycho_situation_at_discharge' => 'string',
        'psycho_outgoings_value' => 'string',
    ];
}

}
