<?php
$menu = [
    'Dashboard',
    'Minha Equipe',
    'Folhas',
    'Assinaturas',
    'Histórico',
];

$stats = [
    ['label' => 'Funcionários da equipe', 'value' => '14', 'icon' => '👥'],
    ['label' => 'Folhas pendentes', 'value' => '6', 'icon' => '⏳'],
    ['label' => 'Folhas assinadas', 'value' => '21', 'icon' => '✅'],
    ['label' => 'Folhas em análise', 'value' => '3', 'icon' => '🔎'],
];

$team = [
    ['name' => 'Camila Nunes', 'role' => 'Analista Financeira', 'sheet' => 'Abril/2026', 'status' => 'Pendente', 'signature' => 'Aguardando colaborador'],
    ['name' => 'Thiago Moura', 'role' => 'Assistente Operacional', 'sheet' => 'Abril/2026', 'status' => 'Assinada', 'signature' => 'Concluída'],
    ['name' => 'Aline Pires', 'role' => 'Coordenadora Comercial', 'sheet' => 'Abril/2026', 'status' => 'Em análise', 'signature' => 'RH validando'],
    ['name' => 'Eduardo Santos', 'role' => 'Analista de Dados', 'sheet' => 'Março/2026', 'status' => 'Rejeitada', 'signature' => 'Correção solicitada'],
    ['name' => 'Vanessa Rocha', 'role' => 'Assistente de RH', 'sheet' => 'Abril/2026', 'status' => 'Assinada', 'signature' => 'Concluída'],
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
    <title>Gestor | G2G Payroll System</title>
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
                <div class="flex h-10 w-10 items-center justify-center rounded-lg border border-[#d4b25a] bg-[#f7d873] text-xl">🗂️</div>
                <div>
                    <p class="text-sm font-semibold text-slate-800">G2G Payroll System</p>
                    <p class="text-xs text-explorer-muted">Área do Gestor</p>
                </div>
            </div>
            <div class="p-4">
                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-[0.18em] text-explorer-muted">Equipe</p>
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
                            <p class="text-sm font-semibold text-slate-800">Visão do gestor</p>
                            <p class="text-xs text-explorer-muted">Equipe de Operações e rotinas de aprovação</p>
                        </div>
                    </div>
                    <a href="index.php" class="rounded-lg border border-explorer-line bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:bg-explorer-soft">Trocar perfil</a>
                </div>
            </header>

            <main class="p-4 sm:p-6">
                <div class="mb-6 rounded-xl border border-explorer-line bg-white shadow-sm">
                    <div class="flex flex-col gap-3 border-b border-explorer-line px-4 py-3 lg:flex-row lg:items-center lg:justify-between">
                        <div class="flex flex-wrap items-center gap-2 text-sm text-explorer-muted">
                            <span>Este Computador</span>
                            <span>&gt;</span>
                            <span>Disco Local (C:)</span>
                            <span>&gt;</span>
                            <span>xampp</span>
                            <span>&gt;</span>
                            <span>htdocs</span>
                            <span>&gt;</span>
                            <span class="font-semibold text-slate-700">g2g &gt; Gestor</span>
                        </div>
                        <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">
                            Unidade: Operações Regionais
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 px-4 py-4 lg:flex-row lg:items-center lg:justify-between">
                        <div class="grid gap-3 sm:grid-cols-3">
                            <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">Equipe: 14 colaboradores</div>
                            <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">Competência: Abril/2026</div>
                            <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">Status: Geral</div>
                        </div>
                        <div class="w-full max-w-sm">
                            <div class="flex items-center rounded-lg border border-explorer-line bg-white px-3 py-2">
                                <span class="mr-2 text-explorer-muted">🔎</span>
                                <input type="text" placeholder="Pesquisar na equipe" class="w-full border-0 bg-transparent text-sm outline-none placeholder:text-explorer-muted">
                            </div>
                        </div>
                    </div>
                </div>

                <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <?php foreach ($stats as $stat): ?>
                        <div class="rounded-xl border border-explorer-line bg-white p-4 shadow-sm">
                            <div class="flex items-start justify-between">
                                <div>
                                    <p class="text-sm text-explorer-muted"><?php echo $stat['label']; ?></p>
                                    <p class="mt-2 text-3xl font-semibold text-slate-800"><?php echo $stat['value']; ?></p>
                                </div>
                                <div class="flex h-12 w-12 items-center justify-center rounded-lg border border-[#d4b25a] bg-[#f7d873] text-xl">
                                    <?php echo $stat['icon']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>

                <section class="mt-6 rounded-xl border border-explorer-line bg-white shadow-sm">
                    <div class="flex flex-col gap-3 border-b border-explorer-line px-4 py-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-800">Funcionários da equipe</h2>
                            <p class="text-sm text-explorer-muted">Acompanhe folhas, assinaturas e pendências dos colaboradores sob sua gestão.</p>
                        </div>
                        <div class="flex gap-2">
                            <button class="rounded-lg border border-explorer-line bg-white px-3 py-2 text-sm text-slate-700 hover:bg-explorer-soft">Filtrar</button>
                            <button class="rounded-lg border border-[#bfd4ea] bg-[#e9f2fb] px-3 py-2 text-sm font-medium text-[#0f548c] hover:bg-[#dcedfb]">Enviar lote</button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm">
                            <thead class="bg-explorer-soft text-explorer-muted">
                                <tr>
                                    <th class="px-4 py-3 font-semibold">Funcionário</th>
                                    <th class="px-4 py-3 font-semibold">Cargo</th>
                                    <th class="px-4 py-3 font-semibold">Última folha</th>
                                    <th class="px-4 py-3 font-semibold">Status</th>
                                    <th class="px-4 py-3 font-semibold">Assinatura</th>
                                    <th class="px-4 py-3 font-semibold">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-explorer-line">
                                <?php foreach ($team as $member): ?>
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-4 py-3 font-medium text-slate-800"><?php echo $member['name']; ?></td>
                                        <td class="px-4 py-3"><?php echo $member['role']; ?></td>
                                        <td class="px-4 py-3"><?php echo $member['sheet']; ?></td>
                                        <td class="px-4 py-3"><?php echo statusBadge($member['status']); ?></td>
                                        <td class="px-4 py-3"><?php echo $member['signature']; ?></td>
                                        <td class="px-4 py-3">
                                            <div class="flex flex-wrap gap-2">
                                                <button class="rounded-md border border-explorer-line bg-white px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-explorer-soft">Visualizar folha</button>
                                                <button class="rounded-md border border-emerald-200 bg-emerald-50 px-2.5 py-1.5 text-xs font-medium text-emerald-700 hover:bg-emerald-100">Aprovar</button>
                                                <button class="rounded-md border border-blue-200 bg-blue-50 px-2.5 py-1.5 text-xs font-medium text-blue-700 hover:bg-blue-100">Enviar</button>
                                                <button class="rounded-md border border-explorer-line bg-white px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-explorer-soft">Acompanhar status</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex flex-col gap-3 border-t border-explorer-line px-4 py-3 sm:flex-row sm:items-center sm:justify-between">
                        <p class="text-sm text-explorer-muted">Mostrando 5 de 14 colaboradores</p>
                        <div class="flex items-center gap-2">
                            <button class="rounded-md border border-explorer-line bg-white px-3 py-1.5 text-sm text-slate-700 hover:bg-explorer-soft">Anterior</button>
                            <button class="rounded-md border border-[#bfd4ea] bg-[#e9f2fb] px-3 py-1.5 text-sm font-medium text-[#0f548c]">1</button>
                            <button class="rounded-md border border-explorer-line bg-white px-3 py-1.5 text-sm text-slate-700 hover:bg-explorer-soft">2</button>
                            <button class="rounded-md border border-explorer-line bg-white px-3 py-1.5 text-sm text-slate-700 hover:bg-explorer-soft">Próxima</button>
                        </div>
                    </div>
                </section>
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
