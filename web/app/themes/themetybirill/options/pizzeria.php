<?php

/**
 * Page d'options « Pizzeria » (Réglages > Pizzeria).
 *
 * Permet au client de modifier horaires, adresse, téléphone et courriel
 * sans toucher au code. Chaque option est validée à l'enregistrement
 * (sanitize_callback) et échappée à l'affichage.
 */
class PizzeriaMenuPage
{
    const GROUP = 'pizzeria_options';
    const SECTION = 'pizzeria_options_section';

    public static function register(): void
    {
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
    }

    public static function registerSettings(): void
    {
        register_setting(self::GROUP, 'pizzeria_schedule', [
            'type'              => 'string',
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);
        register_setting(self::GROUP, 'pizzeria_address', [
            'type'              => 'string',
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);
        register_setting(self::GROUP, 'pizzeria_phone', [
            'type'              => 'string',
            'default'           => '',
            'sanitize_callback' => [self::class, 'sanitizePhone'],
        ]);
        register_setting(self::GROUP, 'pizzeria_mail', [
            'type'              => 'string',
            'default'           => '',
            'sanitize_callback' => [self::class, 'sanitizeMail'],
        ]);

        add_settings_section(self::SECTION, 'Paramètres', function () {
            echo '<p>' . esc_html__('Gérez ici les différents paramètres reliés à la pizzeria.', 'tybirill') . '</p>';
        }, self::GROUP);

        add_settings_field('pizzeria_schedule', 'Horaires', [self::class, 'renderTextarea'], self::GROUP, self::SECTION, [
            'label_for' => 'pizzeria_schedule',
        ]);
        add_settings_field('pizzeria_address', 'Adresse', [self::class, 'renderTextarea'], self::GROUP, self::SECTION, [
            'label_for' => 'pizzeria_address',
        ]);
        add_settings_field('pizzeria_phone', 'Téléphone', [self::class, 'renderInput'], self::GROUP, self::SECTION, [
            'label_for' => 'pizzeria_phone',
            'type'      => 'tel',
        ]);
        add_settings_field('pizzeria_mail', 'Courriel', [self::class, 'renderInput'], self::GROUP, self::SECTION, [
            'label_for' => 'pizzeria_mail',
            'type'      => 'email',
        ]);
    }

    /**
     * Ne garde que les chiffres, espaces, +, points, tirets et parenthèses.
     */
    public static function sanitizePhone($value): string
    {
        return trim(preg_replace('/[^0-9+ .()\-]/', '', (string) $value));
    }

    /**
     * Refuse une adresse invalide en affichant une erreur dans l'admin.
     */
    public static function sanitizeMail($value): string
    {
        $mail = sanitize_email((string) $value);

        if ($value !== '' && !is_email($mail)) {
            add_settings_error('pizzeria_mail', 'invalid_mail', __('L\'adresse courriel n\'est pas valide.', 'tybirill'));
            return (string) get_option('pizzeria_mail', '');
        }

        return $mail;
    }

    public static function renderTextarea(array $args): void
    {
        $name = $args['label_for'];
        printf(
            '<textarea name="%1$s" id="%1$s" rows="5" class="large-text">%2$s</textarea>',
            esc_attr($name),
            esc_textarea(get_option($name, ''))
        );
    }

    public static function renderInput(array $args): void
    {
        $name = $args['label_for'];
        printf(
            '<input type="%1$s" name="%2$s" id="%2$s" value="%3$s" class="regular-text">',
            esc_attr($args['type']),
            esc_attr($name),
            esc_attr(get_option($name, ''))
        );
    }

    public static function addMenu(): void
    {
        add_options_page('Gestion de la pizzeria', 'Pizzeria', 'manage_options', self::GROUP, [self::class, 'render']);
    }

    public static function render(): void
    {
        if (!current_user_can('manage_options')) {
            return;
        }
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields(self::GROUP);
                do_settings_sections(self::GROUP);
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}
