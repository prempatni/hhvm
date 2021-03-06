<?hh // strict

interface I<T> {}
abstract class C<T> implements I<T> {}
final class D extends C<int> {}
final class E extends C<string> {}
final class F implements I<bool> {}

  function is_I(mixed $x): void {
    // Generics are erased at runtime, so this should always work.
    if ($x is I<string>) {
      echo "I\n";
    } else {
      echo "not I\n";
    }
  }

function is_C(mixed $x): void {
  // Generics are erased at runtime, so this should always work.
  if ($x is C<int>) {
    echo "C\n";
  } else {
    echo "not C\n";
  }
}

function is_D(mixed $x): void {
  if ($x is D) {
    echo "D\n";
  } else {
    echo "not D\n";
  }
}

$d = new D();
is_D($d);
is_C($d);
is_I($d);
echo "\n";
$s = new stdClass();
is_D($s);
is_C($s);
is_I($s);
echo "\n";
$e = new E();
is_D($e);
is_C($e);
is_I($e);
echo "\n";
$f = new F();
is_D($f);
is_C($f);
is_I($f);
