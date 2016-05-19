<p align="center">
	<img src="https://cloud.githubusercontent.com/assets/2417212/8925689/add409ea-34be-11e5-8e50-845da8f5b1b0.png" height="320">
</p>

# Aauth-Compat
***
Aauth-Compat is a CodeIgniter-Aauth Compatibility Pack for deleted functions after v2.5.0 

Documentation available on [GitBook](https://cib.gitbooks.io/codeigniter-aauth-compat/content/)

### Features 
***
* System Variables

### Loading the Library
```php
	$this->load->library('aauth_compat');
```
After loading the Library 

### Available Functions
***
System Variables
 - `$this->aauth_compat->set_system_var( $key, $value );` - Add/Update System Variable
 - `$this->aauth_compat->unset_system_var( $key );` - Remove System Variable by Key
 - `$this->aauth_compat->get_system_var( $key );` - Get System Variable by Key
 - `$this->aauth_compat->get_system_vars();` - Get all System Variable
 - `$this->aauth_compat->list_system_var_keys();` - List all System Variables
