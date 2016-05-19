# System Variables

## Examples

### Add or Update a System Variable
Add or Updating System Variable `site_name` with value `example.com Site`.
```php
	$this->load->library('aauth_compat');
	$this->Aauth_Compat->set_system_var('site_name', 'example.com Site');
```

### Retrive a System Variable
Retrive System Variable `site_name`.
```php
	$this->load->library('aauth_compat');
	echo $this->Aauth_Compat->get_system_var('site_name');
```

Results:
```
	example.com Site
```

### Retrive all System Variables
Retrive all System Variables as object array.
```php
	$this->load->library('aauth_compat');
	$system_vars = $this->aauth_compat->get_system_vars();
	print_r($system_vars);
```

Results:  
```
Array
(
    [0] => stdClass Object
        (
            [data_key] => site_name
            [value] => example.com Site
        )

)
```

### Retrive all System Variables Keys
Retrive all System Variables Keys as object array.
```php
    $this->load->library('aauth_compat');
    $system_vars = $this->aauth_compat->list_system_var_keys();
    print_r($system_vars);
```

Results 
```
Array
(
    [0] => stdClass Object
        (
            [data_key] => site_name
        )

)
```

### Un-Set a System Variable
Unset System Variable `site_name`.
```php
	$this->load->library('aauth_compat');
	$this->Aauth_Compat->unset_system_var('site_name');
```

## References

{% PHPclassDisplayer "aauth_compat" %}
    CodeIgniter-Aauth Compatibility class
{% endPHPclassDisplayer %}

{% PHPmethodDisplayer "set_system_var($key, $value)" %}
    Add/Update System Variable by Key
    {% param "$key", type="string" %}
    Key
    {% param "$value", type="string" %}
    Value
    {% return %}
    Either `TRUE`, or `FALSE` on failure.
{% endPHPmethodDisplayer %}

{% PHPmethodDisplayer "get_system_var($key)" %}
    Retrive System Variable by Key
    {% param "$key", type="string" %}
    Key
    {% return %}
    Either the value, or `FALSE` on failure.
{% endPHPmethodDisplayer %}

{% PHPmethodDisplayer "get_system_vars()" %}
    Retrive all System Variables
    {% return %}
    Object array or if none available an empty Array.
{% endPHPmethodDisplayer %}

{% PHPmethodDisplayer "list_system_var_keys()" %}
    Retrive all System Variables Keys
    {% return %}
    Object array or if none available an empty Array.
{% endPHPmethodDisplayer %}

{% PHPmethodDisplayer "unset_system_var($key)" %}
    Remove System Variable by Key
    {% param "$key", type="string" %}
    Key
    {% return %}
    Either `TRUE`, or `FALSE` on failure.
{% endPHPmethodDisplayer %}
