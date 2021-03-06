<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    // indico quali sono i campi 'fillabili', in automatico, tramite il metodo fill()
    // cioè quando utilizzo il metodo fill(), Laravel automaticamente mi copia nel mio
    // oggetto (che è poi un record) che va scritto nel DB, i campi(colonne) che
    // nella tabella del DB hanno quel nome
    protected $fillable=['author', 'text', 'user_id',/*'category_id'*/];


    public function user()
    {
        // ho una relazione 1 a n con la tabella users (1 utente, molte quotes)
        // la tabella users comanda
        return $this->belongsTo('App\Models\User');
    }


    // definisco un metodo 'category()' che ha il nome della tabella verso la quale esiste la relazione, vado a
    // dichiarare il tipo della relazione che questa entità (ovvero il model Quote) ha con un'altra entità (ovvero model Category)
    // il tipo di relazione è: 1 to Many (1 a molti)
    //
    // Questo è il lato '1' (belongsTo) della relazione '1 a molti'.
    // Nel mio DB la relazione 1 a molti sarà tra le tabelle 'categories' e 'quotes':
    // per un record della tabella 'categories' possono essere associati molti records della tabella 'quotes'
    // public function category() {
    //     return $this->belongsTo('App\Models\Category');
    // }
}
