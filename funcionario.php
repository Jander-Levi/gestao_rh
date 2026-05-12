<?php
$menu = [
    'Minha Folha',
    'Histórico',
    'Assinaturas',
    'Perfil',
];

$stats = [
    ['label' => 'Folha Atual', 'value' => 'Abril/2026', 'icon' => '📄'],
    ['label' => 'Pendências', 'value' => '1 item', 'icon' => '⏳'],
    ['label' => 'Folhas Assinadas', 'value' => '11', 'icon' => '✅'],
    ['label' => 'Última Atualização', 'value' => '09/05/2026', 'icon' => '🕒'],
];

$history = [
    ['competency' => 'Abril/2026', 'value' => 'R$ 5.480,00', 'status' => 'Pendente', 'date' => '09/05/2026'],
    ['competency' => 'Março/2026', 'value' => 'R$ 5.480,00', 'status' => 'Assinada', 'date' => '07/04/2026'],
    ['competency' => 'Fevereiro/2026', 'value' => 'R$ 5.310,00', 'status' => 'Assinada', 'date' => '08/03/2026'],
    ['competency' => 'Janeiro/2026', 'value' => 'R$ 5.310,00', 'status' => 'Assinada', 'date' => '09/02/2026'],
    ['competency' => 'Dezembro/2025', 'value' => 'R$ 5.950,00', 'status' => 'Em análise', 'date' => '05/01/2026'],
];

function statusBadge(string $status): string
{
    $map = [
        'Pendente' => 'border-yellow-200 bg-yellow-50 text-yellow-700',
        'Assinada' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
        'Rejeitada' => 'border-red-200 bg-red-50 text-red-700',
        'Em análise' => 'border-blue-200 bg-blue-50 text-blue-700',
    ];

    $classes = $map[$status] ?? 'border-slate-200 bg-slate-50 text-slate-700';
    return '<span class="inline-flex items-center rounded-full border px-2.5 py-1 text-xs font-semibold ' . $classes . '">' . $status . '</span>';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário | G2G Folha de Ponto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        explorer: {
                            bg: '#f3f4f6',
                            panel: '#ffffff',
                            line: '#d6d9df',
                            soft: '#eef1f5',
                            text: '#1f2937',
                            muted: '#6b7280',
                            accent: '#0f6cbd'
                        }
                    },
                    boxShadow: {
                        explorer: '0 1px 2px rgba(15, 23, 42, 0.08), 0 10px 30px rgba(15, 23, 42, 0.05)'
                    }
                }
            }
        };
    </script>
</head>
<body class="bg-explorer-bg text-explorer-text">
    <div class="min-h-screen lg:flex">
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-72 -translate-x-full border-r border-explorer-line bg-white transition duration-200 lg:translate-x-0">
            <div class="flex h-16 items-center gap-3 border-b border-explorer-line px-5">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg border border-[#d4b25a] bg-[#f7d873] text-xl">📄</div>
                <div>
                    <p class="text-sm font-semibold text-slate-800">G2G Folha de Ponto</p>
                    <p class="text-xs text-explorer-muted">Portal do Funcionário</p>
                </div>
            </div>
            <div class="p-4">
                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-[0.18em] text-explorer-muted">Área pessoal</p>
                <nav class="space-y-1">
                    <?php foreach ($menu as $index => $item): ?>
                        <a href="#" class="<?php echo $index === 0 ? 'border-[#bfd4ea] bg-[#e9f2fb] text-[#0f548c]' : 'border-transparent text-slate-700 hover:bg-explorer-soft'; ?> flex items-center gap-3 rounded-lg border px-3 py-2.5 text-sm font-medium transition">
                            <span><?php echo $index === 0 ? '📁' : '📄'; ?></span>
                            <?php echo $item; ?>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </div>
        </aside>

        <div class="min-h-screen flex-1 lg:ml-72">
            <header class="sticky top-0 z-30 border-b border-explorer-line bg-white/95 backdrop-blur">
                <div class="flex h-16 items-center justify-between px-4 sm:px-6">
                    <div class="flex items-center gap-3">
                        <button id="toggleSidebar" class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-explorer-line bg-white text-slate-700 lg:hidden">☰</button>
                        <div>
                            <p class="text-sm font-semibold text-slate-800">Área pessoal de folhas</p>
                            <p class="text-xs text-explorer-muted">Consulta individual com histórico e assinatura simulada</p>
                        </div>
                    </div>
                    <a href="index.php" class="rounded-lg border border-explorer-line bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:bg-explorer-soft">Trocar perfil</a>
                </div>
            </header>

            <main class="p-4 sm:p-6">
                <div class="mb-6 rounded-xl border border-explorer-line bg-white shadow-sm">
                    <div class="flex flex-col gap-3 border-b border-explorer-line px-4 py-3 lg:flex-row lg:items-center lg:justify-between">
                        <div></div>
                        <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">
                            Colaborador: João Henrique Silva
                        </div>
                    </div>
                    <div class="grid gap-3 px-4 py-4 md:grid-cols-3">
                        <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">Matrícula: 2026-0148</div>
                        <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">Cargo: Analista Administrativo</div>
                        <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">Departamento: Financeiro</div>
                    </div>
                </div>

                <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <?php foreach ($stats as $stat): ?>
                        <div class="rounded-xl border border-explorer-line bg-white p-4 shadow-sm">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm text-explorer-muted"><?php echo $stat['label']; ?></p>
                                    <p class="mt-2 text-2xl font-semibold text-slate-800"><?php echo $stat['value']; ?></p>
                                </div>
                                <div class="flex h-12 w-12 items-center justify-center rounded-lg border border-[#d4b25a] bg-[#f7d873] text-xl">
                                    <?php echo $stat['icon']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>

                <div class="mt-6 grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
                    <section class="rounded-xl border border-explorer-line bg-white shadow-sm">
                        <div class="border-b border-explorer-line px-4 py-4">
                            <h2 class="text-lg font-semibold text-slate-800">Histórico de folhas</h2>
                            <p class="text-sm text-explorer-muted">Acompanhe competências anteriores e status de assinatura.</p>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm">
                                <thead class="bg-explorer-soft text-explorer-muted">
                                    <tr>
                                        <th class="px-4 py-3 font-semibold">Competência</th>
                                        <th class="px-4 py-3 font-semibold">Valor</th>
                                        <th class="px-4 py-3 font-semibold">Status</th>
                                        <th class="px-4 py-3 font-semibold">Data</th>
                                        <th class="px-4 py-3 font-semibold">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-explorer-line">
                                    <?php foreach ($history as $item): ?>
                                        <tr class="hover:bg-slate-50">
                                            <td class="px-4 py-3 font-medium text-slate-800"><?php echo $item['competency']; ?></td>
                                            <td class="px-4 py-3"><?php echo $item['value']; ?></td>
                                            <td class="px-4 py-3"><?php echo statusBadge($item['status']); ?></td>
                                            <td class="px-4 py-3"><?php echo $item['date']; ?></td>
                                            <td class="px-4 py-3">
                                                <div class="flex flex-wrap gap-2">
                                                    <button class="rounded-md border border-explorer-line bg-white px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-explorer-soft">Visualizar</button>
                                                    <button class="rounded-md border border-emerald-200 bg-emerald-50 px-2.5 py-1.5 text-xs font-medium text-emerald-700 hover:bg-emerald-100">Assinar</button>
                                                    <button class="rounded-md border border-blue-200 bg-blue-50 px-2.5 py-1.5 text-xs font-medium text-blue-700 hover:bg-blue-100">Baixar PDF</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section class="space-y-6">
                        <div class="rounded-xl border border-explorer-line bg-white p-5 shadow-sm">
                            <h2 class="text-lg font-semibold text-slate-800">Resumo da folha atual</h2>
                            <div class="mt-4 space-y-3 text-sm">
                                <div class="flex items-center justify-between rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2">
                                    <span class="text-explorer-muted">Competência</span>
                                    <span class="font-medium text-slate-800">Abril/2026</span>
                                </div>
                                <div class="flex items-center justify-between rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2">
                                    <span class="text-explorer-muted">Valor líquido</span>
                                    <span class="font-medium text-slate-800">R$ 5.480,00</span>
                                </div>
                                <div class="flex items-center justify-between rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2">
                                    <span class="text-explorer-muted">Status</span>
                                    <span><?php echo statusBadge('Pendente'); ?></span>
                                </div>
                                <div class="flex items-center justify-between rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2">
                                    <span class="text-explorer-muted">Publicada em</span>
                                    <span class="font-medium text-slate-800">09/05/2026</span>
                                </div>
                            </div>
                            <div class="mt-5 flex flex-wrap gap-2">
                                <button class="rounded-lg border border-explorer-line bg-white px-3 py-2 text-sm text-slate-700 hover:bg-explorer-soft">Visualizar detalhes</button>
                                <button class="rounded-lg border border-[#bfd4ea] bg-[#e9f2fb] px-3 py-2 text-sm font-medium text-[#0f548c] hover:bg-[#dcedfb]">Assinar folha</button>
                            </div>
                        </div>

                        <div class="rounded-xl border border-explorer-line bg-white p-5 shadow-sm">
                            <h2 class="text-lg font-semibold text-slate-800">Pendências</h2>
                            <ul class="mt-4 space-y-3 text-sm text-explorer-muted">
                                <li class="rounded-lg border border-yellow-200 bg-yellow-50 px-3 py-3 text-yellow-800">Assinatura da folha Abril/2026 aguardando confirmação.</li>
                                <li class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-3">Atualização cadastral prevista para o próximo ciclo de ponto.</li>
                            </ul>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleSidebar = document.getElementById('toggleSidebar');

        toggleSidebar?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
</body>
</html>
