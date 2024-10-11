<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\RdvPanneauxPhotovoltaique;
use App\Models\RdvPompeAChaleur;
use App\Models\RdvThermostat;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'mot_de_passe' => 'hashed',
        ];
    }

     
     public function rdvPanneauxAsAgent()
     {
         return $this->hasMany(RdvPanneauxPhotovoltaique::class, 'agent_id');
     }
 
     
     public function rdvPanneauxAsPartenaire()
     {
         return $this->hasMany(RdvPanneauxPhotovoltaique::class, 'partenaire_id');
     }
 
     
     public function rdvPompeAsAgent()
     {
         return $this->hasMany(RdvPompeAChaleur::class, 'agent_id');
     }
 
     public function rdvPompeAsPartenaire()
     {
         return $this->hasMany(RdvPompeAChaleur::class, 'partenaire_id');
     }
 
     
     public function rdvThermostatsAsAgent()
     {
         return $this->hasMany(RdvThermostat::class, 'agent_id');
     }
 
     public function rdvThermostatsAsPartenaire()
     {
         return $this->hasMany(RdvThermostat::class, 'partenaire_id');
     }
     
}
