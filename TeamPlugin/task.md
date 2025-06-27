# Testaufgabe Administration Mitarbeiter Verwaltung

## Administration Mitarbeiter Verwaltung

Ein Kunde möchte seine Mitarbeiter in seinem Online Shop auf einer “Team” Seite vorstellen. Er betreibt einen Shopware 6 Shop und möchte jeden einzelnen Mitarbeiter als eigenen Datensatz speichern und dann über eine CMS Extension in der Storefront anzeigen. 

Die Darstellung ist zweitrangig. Es geht hauptsächlich um die Funktionalität.

### Ziel

- Eigenes Plugin
- Eigene Datenbanktabelle, DAL Definition, DAL Entity, DAL Collection
- Eigener CMS Block
- Eigenes CMS Element
- Neuer Menüpunkt in der Administration zB. unter “Inhalt”
    - Eigene Liste die alle angelegten Mitarbeiter zeigt
    - Funktion zum erstellen und Löschen von Mitarbeitern
    - Beim erstellen der Mitarbeiter kann angegeben werden:
        - Position
        - Bild (Für den Hintergrund)
        - Bild (Für die Person)
        - Text (HTML Editor)
- Über die CMS Elemente soll ein Block mit einem Element erstellt werden
    - Konfigurationsmöglichkeit: Ein Multi-Select aus den angelegten Mitarbeitern
- Über einen Resolver soll das CMS Element ins Frontend übergeben werden und die Mitarbeiter darstellen

### Abgabe

- Ergebnis per Mail an [eric.schwengers@8mylez.com](mailto:eric.schwengers@8mylez.com) und [monika.geiss@8mylez.com](mailto:monika.geiss@8mylez.com)
- docker-compose.yml und Basis Plugin als Zip
- Betreff der Email: **TESTAUFGABE [Vorname Nachname] Abgabe Administration Mitarbeiter Verwaltung**
- Screenshot von dem Ergebnis anhängen