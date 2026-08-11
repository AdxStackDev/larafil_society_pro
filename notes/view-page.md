In Filament, a "view" page is a read-only page that shows a record's details without allowing edits. Here's how to add one.

---

## Step 1 — Create the ViewUsers page file

Create this file: `app/Filament/Resources/Users/Pages/ViewUsers.php`

```php
<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UsersResource;
use Filament\Resources\Pages\ViewRecord;

class ViewUsers extends ViewRecord
{
    protected static string $resource = UsersResource::class;
}
```

---

## Step 2 — Register it in `UsersResource.php`

Open `app/Filament/Resources/Users/UsersResource.php` and add the view route to `getPages()`:

```php
// add this import at the top
use App\Filament\Resources\Users\Pages\ViewUsers;

// then in getPages()
public static function getPages(): array
{
    return [
        'index'  => ListUsers::route('/'),
        'create' => CreateUsers::route('/create'),
        'view'   => ViewUsers::route('/{record}'),      // 👈 add this
        'edit'   => EditUsers::route('/{record}/edit'),
    ];
}
```

---

## Step 3 — Add a View button to the table

Open `app/Filament/Resources/Users/Tables/UsersTable.php` and add `ViewAction`:

```php
use Filament\Actions\ViewAction;  // 👈 add this import

->recordActions([
    ViewAction::make(),   // 👈 add this
    EditAction::make(),
])
```

---

## That's it. The flow now looks like this:

```
List page  →  click View  →  ViewUsers.php  →  shows form fields as read-only
           →  click Edit  →  EditUsers.php  →  shows form fields as editable
```

The view page **automatically reuses your `UsersForm.php`** fields — it just renders them as read-only. You don't need a separate schema for it.