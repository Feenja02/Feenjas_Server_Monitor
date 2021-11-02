<?php

return [
    /** general translation stuff */
    'dashboard' => 'Dashboard',
    'Temp' => 'Temperatur',
    'Hum' => 'Luftfeuchtigkeit',
    'name' => 'Name',
    'location' => 'Standort',
    'street_number' => 'Straße, Nummer',
    'zip_code' => 'PLZ',
    'city' => 'Ort',
    'warning' => 'Warnung',
    'warnings' => 'Warnungen',
    'address' => 'Adresse',
    'street' => 'Straße',
    'number' => 'Nummer',

    /** Warnings */
    'limit_values_temp' => 'Grenzwerte für Temperatur wurden über- oder unterschritten',
    'limit_values_hum' => 'Grenzwerte für Luftfeuchtigkeit wurden über- oder unterschritten',
    'limit_values_temp_hum' => 'Grenzwerte für Temperatur/Luftfeuchtigkeit wurden über- oder unterschritten',

    /** User/s */
    'role' => 'Rolle',
    'admin' => 'Admin',
    'users' => 'Nutzer',
    'user' => 'Nutzer',
    'user_list' => 'Liste der Nutzer',
    'create_user' => 'Nutzer anlegen',
    'email' => 'E-Mail',
    'password' => 'Passwort',
    'confirm_password' => 'Passwort bestätigen',
    'forgot_pw' => 'Passwort vergessen?',
    'remember_me' => 'Angemeldet bleiben',
    'edit_user' => 'Nutzer bearbeiten',
    'pw_reset_info' => 'Klick auf Button versendet Mail an User zum Zurücksetzen des PW',
    'reset_pw' => 'Passwort zurücksetzen',
    'forgot_pw_message' => 'Wenn Sie Ihr Passwort vergessen haben sollten, wenden Sie sich hierzu bitte an Ihren Adminsitrator: :ADMIN - :EMAIL',

    /** Client/s */
    'clients' => 'Clients',
    'client_id' => 'Client-ID',
    'clients_list' => 'Liste der Clients',
    'client_not_activated' => 'Dieser Client ist deaktiviert.',
    'click_to_deactivate' => 'Klicken zum DEAKTIVIEREN',
    'click_to_activate' => 'Klicken zum AKTIVIEREN',
    'delete_client' => 'Client Löschen',
    'delete_client_message' => 'Wirklich Löschen?',
    'client_down' => 'Client Down',
    'client_down_info' => 'Der Client ":CLIENT" sendet keine Werte mehr.',
    'client_down_icon' => 'Hat in der letzten Zeit keine Werte gesendet',
    'create_client' => 'Client anlegen',
    'edit_client' => 'Client bearbeiten',

    /** Timeline */
    'timeline' => 'Verlauf',
    'timeline_info' => 'Verlauf der Werte in den letzten 24 Stunden',
    'chart_y_axis' => 'Temp in °C + Hum in %',

    /** Action - Buttons */
    'create' => 'Erstellen',
    'edit' => 'Bearbeiten',
    'delete' => 'Löschen',
    'cancel' => 'Abbrechen',
    'save' => 'Speichern',
    'back' => 'Zurück',
    'log_out' => 'Abmelden',
    'log_in' => 'Anmelden',
    'close' => 'Schließen',

    /** Mail-Notifications */
    'greeting' => 'Hallo, ',
    'val_limit_reached_mail' => 'die gemessenen Werte von :CLIENT hat folgende Grenzwerte überschritten:',
    'to_dashboard' => 'Zum Dashboard',
    'client_down_mail' => 'der Client :CLIENT ist ausgefallen. Bitte dringend überprüfen!',
    'reset_pw_mail_info' => 'Ihr Administrator hat Ihnen diese Mail zukommen lassen aufgrund Ihrer Anfrage zum Zurücksetzen Ihres Passwortes für Ihren Account.',
    'reset_pw_link_expire_info' => 'Der Link zum Zurücksetzen des Passworts läuft in :count Minuten ab.',
    'reset_pw_no_action' => 'Wenn Sie keine Rücksetzung des Kennworts beantragt haben, sind keine weiteren Schritte erforderlich.',
    'regards_mail' => 'Mit freundlichen Grüßen, Ihr Admin',
];
