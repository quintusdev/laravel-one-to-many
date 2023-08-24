<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'image' => 'image|max:250',
            'type_id' => 'required|exists:types,id'
        ];
    }
    /* Funzione per gestire i messaggi di errore in ITA */
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max'  => "Il titolo deve avere meno di :max caratteri.",
            /* messaggi di errore per l'immagine */
            'image.image'  => "Il file deve avere una delle seguenti estensioni: jpg, jpeg, png, webp",
            'image.max'  => "L'indirizzo dell'immagine deve avere al massimo :max caratteri.",
            /* messaggi di errore per la tipologia */
            'type_id.required' => "Devi selezionare una categoria",
            'type_id.exists' => "Categoria selezionata non valida"
        ];
    }
}
