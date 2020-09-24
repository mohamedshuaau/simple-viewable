###Methods:
##
If you want to add a view you can simply call the `view()` method:
```
$post = Post::find(1);
SimpleViewable::view($post);
```
This method will log all the records of every visit and is not unique. 
In order to make the views unique, you may use the `unique()` method:
```
$post = Post::find(1);
SimpleViewable::unique($post);
```
The unique method will only log the view if the session id is different.

The `expires()` method can be used to throttle views. This method expects
a second date parameter:

```
$post = Post::find(1);
$fiveMinutes = Carbon::now()->addMinutes(5);
SimpleViewable::expires($post, $fiveMinutes);
```
If you want to count all the views (non-unique) but you want to throttle,
this is an ideal solution.

The `count()` method will return the count of all the views for that model:
```
$post = Post::find(1);
SimpleViewable::count($post);
```

The `countUnique()` method returns the unique view counts for the model:
```
$post = Post::find(1);
SimpleViewable::countUnique($post);
```

The `countFrom()` method will return the count of all the views for the given
model starting from the specified date:
```
$post = Post::find(1);
$from = Carbon::yesterday();
SimpleViewable::countFrom($post, $from);
```

The `countBetween()` method will return the count of all the views for the
given model in between the given date:
```
$post = Post::find(1);
$from = Carbon::yesterday();
$to = Carbon::now();
SimpleViewable::countBetween($post, $from, $to);
```

The `countUniqueFrom()` method will return the count of all the unique views for the given
model starting from the specified date:
```
$post = Post::find(1);
$from = Carbon::yesterday();
SimpleViewable::countUniqueFrom($post, $from);
```

The `countUniqueBetween()` method will return the count of all the unique views for the
given model in between the given date:
```
$post = Post::find(1);
$from = Carbon::yesterday();
$to = Carbon::now();
SimpleViewable::countUniqueBetween($post, $from, $to);
```
##
