<?php

#[\AllowDynamicProperties]
class Request {

    public function __construct()
    {
        if(count($_GET) >= 1) {
            foreach ($_GET as $G => $V) {
                $this->{$G} = $V;
            }
        }

        if(count($_POST) >= 1) {
            foreach ($_POST as $P => $V) {
                $this->{$P} = $V;
            }
        }
    }

    public function __set(string $name, mixed $value): void {
        $this->{$name} = $value;
    }

    public function has($key, $default = false) {
        if(isset($this->{$key})) {
            return $this->{$key};
        }
        return $default;
    }

}
