<?php use 
App\Actions\EventSaver;
use App\Models\Event;
use PHPUnit\Framework\TestCase;

class EventSaverTest extends TestCase
{
  /**
  * @dataProvider eventDtoDataProvider
  */
  public function testHandleCallCorrectlnsertlnHodel (array $eventDto, array $expectedArray): void
  {
    $mock = Mockery::mock(Event::class);
    $mock->shouldReceive('insert')
    ->once();
    $eventSaver = new EventSaver($mock);
    $eventSaver->handle($eventDto);
    $mock->shouldHaveReceived('insert',
      [
        "name, receiver_id, text, minute, hour, day, month, day_of_week",
        $expectedArray
      ]
    );
  $this->assertTrue( condition: true);
  }
  public static function eventOtoDataProvider(): array
  {
    return [
    'correct event dto'=> [
    new EventDto(l,
    'name',
    'text',
    '1',
    date('i'),
    date('H'),
    date('d'),
    date('m'),
    date('w'),
    )]
    ];
  }
  
}
