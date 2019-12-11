<?php


Route::set('index.php', function () {
		echo "welcome home";
		});

Route::set('create_account', function () {
		CreateAccount::Create();
		});

Route::set('login', function () {
		Login::CreateView('login');
		Login::Log_in();
		});

Route::set('logout', function () {
		echo "logout";
		});

Route::set('ft_instagram', function () {
		echo "ft_instagram";
		});

Route::set('setup', function () {
		Setup::delete_db();
		Setup::create_db();
		});


?>
