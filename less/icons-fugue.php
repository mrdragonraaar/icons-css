<?php

$argc === 2 || die("usage: $argv[0] [path]\n");

$base = realpath($argv[1]);
(is_dir($base) && is_readable($base)) || die("Cannot read directory $base\n");

$path = "/icons";
(is_dir("$base$path") && is_readable("$base$path")) || die("Cannot read directory $base$path\n");

$path_shadowless = "/icons-shadowless";
(is_dir("$base$path_shadowless") && is_readable("$base$path_shadowless")) || die("Cannot read directory $base$path_shadowless\n");

$bonus_base = "/bonus";
(is_dir("$base$bonus_base") && is_readable("$base$bonus_base")) || die("Cannot read directory $base$bonus_base\n");

$path_24 = "/icons-24";
(is_dir("$base$bonus_base$path_24") && is_readable("$base$bonus_base$path_24")) || die("Cannot read directory $base$bonus_base$path_24\n");

$path_shadowless_24 = "/icons-shadowless-24";
(is_dir("$base$bonus_base$path_shadowless_24") && is_readable("$base$bonus_base$path_shadowless_24")) || die("Cannot read directory $base$bonus_base$path_shadowless_24\n");

$path_32 = "/icons-32";
(is_dir("$base$bonus_base$path_32") && is_readable("$base$bonus_base$path_32")) || die("Cannot read directory $base$bonus_base$path_32\n");

$path_shadowless_32 = "/icons-shadowless-32";
(is_dir("$base$bonus_base$path_shadowless_32") && is_readable("$base$bonus_base$path_shadowless_32")) || die("Cannot read directory $base$bonus_base$path_shadowless_32\n");

// Paths
echo "@icons-fugue-base: \"$base\";\n";
echo "@icons-fugue-path: \"@{icons-fugue-base}$path\";\n";
echo "@icons-fugue-shadowless-path: \"@{icons-fugue-base}$path_shadowless\";\n";
echo "@icons-fugue-bonus-base: \"@{icons-fugue-base}$bonus_base\";\n";
echo "@icons-fugue-24-path: \"@{icons-fugue-bonus-base}$path_24\";\n";
echo "@icons-fugue-shadowless-24-path: \"@{icons-fugue-bonus-base}$path_shadowless_24\";\n";
echo "@icons-fugue-32-path: \"@{icons-fugue-bonus-base}$path_32\";\n";
echo "@icons-fugue-shadowless-32-path: \"@{icons-fugue-bonus-base}$path_shadowless_32\";\n";

// Header
?>

.icons-fugue {
	display: inline-block;
	width: 16px;
	height: 16px;
	line-height: 16px;
	vertical-align: text-top;
	background-position: 0 0;
	background-repeat: no-repeat;
<?php

// Icons
if ($fh = opendir("$base$path")) {
	while (false !== ($icon = readdir($fh))) {
		if (pathinfo($icon, PATHINFO_EXTENSION) === 'png') {
			echo "\t&.icon-" . pathinfo($icon, PATHINFO_FILENAME) . " { ";
			echo "background-image: data-uri(\"@{icons-fugue-path}/$icon\"); }\n";
		}
	}
	closedir($fh);
}

if ($fh = opendir("$base$path_shadowless")) {
	while (false !== ($icon = readdir($fh))) {
		if (pathinfo($icon, PATHINFO_EXTENSION) === 'png') {
			echo "\t&.icons-shadowless.icon-" . pathinfo($icon, PATHINFO_FILENAME) . " { ";
			echo "background-image: data-uri(\"@{icons-fugue-shadowless-path}/$icon\"); }\n";
		}
	}
	closedir($fh);
}

// Icons 24
?>

	&.icons-24 {
		width: 24px;
		height: 24px;
		line-height: 24px;

<?php
if ($fh = opendir("$base$bonus_base$path_24")) {
	while (false !== ($icon = readdir($fh))) {
		if (pathinfo($icon, PATHINFO_EXTENSION) === 'png') {
			echo "\t\t&.icon-" . pathinfo($icon, PATHINFO_FILENAME) . " { ";
			echo "background-image: data-uri(\"@{icons-fugue-24-path}/$icon\"); }\n";
			echo "\t\t&.icons-shadowless.icon-" . pathinfo($icon, PATHINFO_FILENAME) . " { ";
			echo "background-image: data-uri(\"@{icons-fugue-shadowless-24-path}/$icon\"); }\n";
		}
	}
	closedir($fh);
}
?>
	}
<?php

// Icons 32
?>

	&.icons-32 {
		width: 32px;
		height: 32px;
		line-height: 32px;

<?php
if ($fh = opendir("$base$bonus_base$path_32")) {
	while (false !== ($icon = readdir($fh))) {
		if (pathinfo($icon, PATHINFO_EXTENSION) === 'png') {
			echo "\t\t&.icon-" . pathinfo($icon, PATHINFO_FILENAME) . " { ";
			echo "background-image: data-uri(\"@{icons-fugue-32-path}/$icon\"); }\n";
			echo "\t\t&.icons-shadowless.icon-" . pathinfo($icon, PATHINFO_FILENAME) . " { ";
			echo "background-image: data-uri(\"@{icons-fugue-shadowless-32-path}/$icon\"); }\n";
		}
	}
	closedir($fh);
}
?>
	}
<?php

// Footer
?>
}
