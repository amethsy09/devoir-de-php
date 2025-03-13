<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Dettes Non Soldées</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Liste des Dettes Non Soldées</h1>

        <!-- Liste des dettes non soldées -->
        <h2 class="text-xl font-semibold mb-4">Dettes Non Soldées</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID Dette</th>
                    <th class="py-2 px-4 border-b">Montant</th>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">ID Client</th>
                    <th class="py-2 px-4 border-b">État</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($dettesNonSoldees)): ?>
                    <tr>
                        <td colspan="5" class="py-2 px-4 border-b text-center">Aucune dette non soldée trouvée.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($dettesNonSoldees as $dette): ?>
                        <tr>
                            <td class="py-2 px-4 border-b text-center"><?= htmlspecialchars($dette['dette_id']) ?></td>
                            <td class="py-2 px-4 border-b text-center"><?= htmlspecialchars($dette['montant']) ?></td>
                            <td class="py-2 px-4 border-b text-center"><?= htmlspecialchars($dette['date']) ?></td>
                            <td class="py-2 px-4 border-b text-center"><?= htmlspecialchars($dette['client_id']) ?></td>
                            <td class="py-2 px-4 border-b text-center"><?= htmlspecialchars($dette['etat']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>