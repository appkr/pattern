## Port of Java Example of "Command Pattern" from Wikipedia

see https://en.wikipedia.org/wiki/Command_pattern

![](https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Command_pattern.svg/1400px-Command_pattern.svg.png)

`Client`|`Invoker(CommandManager)`|`Command(Handler)`|`Receiver`
---|---|---|---
`SwitchControllerTest`|`SwitchController`|`Command`<br/>`FlipUpCommand`<br/>`FlipDownCommand`|`Light`

### Run

```bash
$ vendor/bin/phpunit --color tests
```

### Question

1. Is it still valid calling `$switchUp->execute()` directly, instead of calling it via an Invoker as in the source code, `(new SwitchController)->storeAndExecute($switchUp)`? The client does'nt need to know about details of Receiver class, namely `Light::turnOn()` and `Light::turnOff()`. But is it also true that the Client does'nt have to have knowledge on Command?

```php
public function testCanTurnOnLight()
{
    $light = new Light;
    $switchUp = new FlipUpCommand($light);
    $switchUp->execute();
}
```

2. What's the benefits of using command pattern?

> Using command objects makes it easier to construct general components that need to delegate, sequence or execute method calls at a time of their choosing without the need to know the class of the method or the method parameters. Using an Invoker object allows bookkeeping about command executions to be conveniently performed, as well as implementing different modes for commands, which are managed by the invoker object, without the need for the client to be aware of the existence of bookkeeping or modes.
>
> <small><cite>From Wikipedia</cite></small>

> The main motivation for using the Command pattern is that the executor of the command does not need to know anything at all about what the command is, what context information it needs on or what it does. All of that is encapsulated in the command.
>
> This allows you to do things such as have a list of commands that are executed in order, that are dependent on other items, that are assigned to some triggering event etc.
>
> In your example, you could have other classes (e.g. Air Conditioner) that have their own commands (e.g. Turn Thermostat Up, Turn Thermostat Down). Any of these commands could be assigned to a button or triggered when some condition is met without requiring any knowledge of the command.
>
> So, in summary, the pattern encapsulates everything required to take an action and allows the execution of the action to occur completely independently of any of that context. If that is not a requirement for you then the pattern is probably not helpful for your problem space.
>
> <small><cite>https://stackoverflow.com/a/32597828</cite></small>

