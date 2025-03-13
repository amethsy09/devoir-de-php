<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Client et une Dette</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Ajouter un Client et une Dette</h1>
        <form action="" method="post">
            <input type="hidden" name="controller" value="clients">
            <input type="hidden" name="page" value="ajout">
            <h2 class="text-xl font-semibold mb-4">Informations du Client</h2>
            <div class="mb-4">
                <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone:</label>
                <input type="text" id="tel" name="tel" value="<?= htmlspecialchars($_POST['tel'] ?? '') ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <?php if (isset($errors['tel'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['tel']) ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom:</label>
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <?php if (isset($errors['nom'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['nom']) ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse:</label>
                <input type="text" id="adresse" name="adresse" value="<?= htmlspecialchars($_POST['adresse'] ?? '') ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <?php if (isset($errors['adresse'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['adresse']) ?></p>
                <?php endif; ?>
            </div>

            <h2 class="text-xl font-semibold mb-4 mt-8">Informations de la Dette</h2>
            <div class="mb-4">
                <label for="montant" class="block text-sm font-medium text-gray-700">Montant:</label>
                <input type="number" id="montant" name="montant" value="<?= htmlspecialchars($_POST['montant'] ?? '') ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <?php if (isset($errors['montant'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['montant']) ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Date:</label>
                <input type="date" id="date" name="date" value="<?= htmlspecialchars($_POST['date'] ?? '') ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <?php if (isset($errors['date'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['date']) ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="etat" class="block text-sm font-medium text-gray-700">État:</label>
                <select id="etat" name="etat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Solde" <?= ($_POST['etat'] ?? '') === 'Solde' ? 'selected' : '' ?>>Solde</option>
                    <option value="Restant" <?= ($_POST['etat'] ?? '') === 'Restant' ? 'selected' : '' ?>>Restant</option>
                </select>
                <?php if (isset($errors['etat'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['etat']) ?></p>
                <?php endif; ?>
            </div>

            <div class="flex justify-end">
                <button type="submit" name="ajout" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Ajouter</button>
            </div>
        </form>
    </div>
</body>
</html>