<?php
class PizzeriaMenuPage
{

  const GROUP = 'pizzeria_options';

  public static function register()
  {
    add_action('admin_menu', [self::class, 'addMenu']);
    add_action('admin_init', [self::class, 'registerSettings']);
  }

  public static function registerSettings()
  {
    register_setting(self::GROUP, 'pizzeria_schedule', ['default' => 'Nos horaires']);
    register_setting(self::GROUP, 'pizzeria_phone', ['default' => 'Téléphone']);
    register_setting(self::GROUP, 'pizzeria_mail', ['default' => 'e-mail']);
    register_setting(self::GROUP, 'pizzeria_address', ['default' => 'Notre adresse']);

    add_settings_section('pizzeria_options_section', 'Paramètres', function () {
      echo "Gérez ici les différents paramètres reliés à la pizzeria.";
    }, self::GROUP);

    //TODO => Échapper la saisie des champs

    add_settings_field('pizzeria_options_schedule', 'Horaires', function () {
?>
      <textarea name="pizzeria_schedule" id="" cols="30" rows="10" style="width:100%;"><?= get_option('pizzeria_schedule') ?></textarea>
    <?php
    }, self::GROUP, 'pizzeria_options_section');

    add_settings_field('pizzeria_options_address', 'Adresse', function () {
    ?>
      <textarea name="pizzeria_address" id="" cols="30" rows="10" style="width:100%;"><?= get_option('pizzeria_address') ?></textarea>
    <?php
    }, self::GROUP, 'pizzeria_options_section');

    add_settings_field('pizzeria_options_phone', 'Téléphone', function () {
    ?>
      <textarea name="pizzeria_phone" id="" cols="30" rows="10" style="width:100%;"><?= get_option('pizzeria_phone') ?></textarea>
    <?php
    }, self::GROUP, 'pizzeria_options_section');

    add_settings_field('pizzeria_options_mail', 'Courriel', function () {
    ?>
      <textarea name="pizzeria_mail" id="" cols="30" rows="10" style="width:100%;"><?= get_option('pizzeria_mail') ?></textarea>
    <?php
    }, self::GROUP, 'pizzeria_options_section');
  }

  public static function addMenu()
  {
    add_options_page("Gestion de la pizzeria", "Pizzeria", "manage_options", self::GROUP, [self::class, 'render']);
  }

  public static function render()
  {
    ?>
    <h1>Gestion de la pizzeria</h1>

    <form action="options.php" method="post">

      <?php
      settings_fields(self::GROUP);
      do_settings_sections(self::GROUP);
      submit_button();
      ?>
    </form>
<?php
  }
}
