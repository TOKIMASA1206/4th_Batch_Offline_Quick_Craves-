<?php



/** Create unique slug */
if (!function_exists('generateUniqueSlug')) {

    function generateUniqueSlug($model, $name, $existingSlug = null): string
    {
        $modelClass = "App\\Models\\$model";

        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $model not found.");
        }

        $slug = Illuminate\Support\Str::slug($name);

        if ($existingSlug && $slug === $existingSlug) {
            return $existingSlug;
        }

        $count = 1;
        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = Illuminate\Support\Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
