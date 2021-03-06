<?php

namespace spec\Knp\DictionaryBundle\Dictionary;

use Knp\DictionaryBundle\DataCollector\DictionaryDataCollector;
use Knp\DictionaryBundle\Dictionary;
use Knp\DictionaryBundle\Dictionary\SimpleDictionary;
use PhpSpec\ObjectBehavior;

class TraceableDictionarySpec extends ObjectBehavior
{
    public function let(DictionaryDataCollector $collector)
    {
        $dictionary = new SimpleDictionary('name', [
            'foo' => 'bar',
            'baz' => null,
        ]);

        $this->beConstructedWith($dictionary, $collector);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Knp\DictionaryBundle\Dictionary\TraceableDictionary');
    }

    public function it_is_a_dictionary()
    {
        $this->shouldImplement('Knp\DictionaryBundle\Dictionary');
    }

    public function it_has_a_name()
    {
        $this->getName()->shouldReturn('name');
    }

    public function it_traces_keys($collector)
    {
        $collector->addDictionary('name', ['foo', 'baz'], ['bar', null])->shouldbeCalled();

        $this->getKeys()->shouldReturn(['foo', 'baz']);
    }

    public function it_traces_values($collector)
    {
        $collector->addDictionary('name', ['foo', 'baz'], ['bar', null])->shouldbeCalled();

        $this->getValues()->shouldReturn(['foo' => 'bar', 'baz' => null]);
    }

    public function it_traces_values_get($collector)
    {
        $collector->addDictionary('name', ['foo', 'baz'], ['bar', null])->shouldbeCalled();

        $this['foo']->shouldReturn('bar');
    }

    public function it_traces_key_exists($collector)
    {
        $collector->addDictionary('name', ['foo', 'baz'], ['bar', null])->shouldbeCalled();

        expect(isset($this['baz']))->toBe(true);
    }

    public function it_trace_iteration($collector)
    {
        $collector->addDictionary('name', ['foo', 'baz'], ['bar', null])->shouldbeCalled();

        expect(\iterator_to_array($this->getIterator()->getWrappedObject()))->toBe(['foo' => 'bar', 'baz' => null]);
    }

    public function it_gives_back_dictionary()
    {
        $this->getOriginalDictionary()->shouldBeAnInstanceOf(Dictionary::class);
    }
}
