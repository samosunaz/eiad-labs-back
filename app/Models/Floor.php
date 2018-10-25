<?

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Floor extends Model
{
  protected $connection = 'mysql';
  protected $table = 'floor';

  protected $with = [
    'labs'
  ];

  public function labs() {
    return $this->hasMany(Lab::class);
  }

}
