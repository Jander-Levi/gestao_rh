<?php
$menu = [
    'Dashboard',
    'Usuários',
    'Funcionários',
    'Gestores',
    'Folhas de Ponto',
    'Assinaturas',
    'Histórico',
    'Configurações',
];

$stats = [
    ['label' => 'Total de Usuários', 'value' => '248', 'icon' => '👥'],
    ['label' => 'Total de Funcionários', 'value' => '189', 'icon' => '📄'],
    ['label' => 'Total de Gestores', 'value' => '26', 'icon' => '🗂️'],
    ['label' => 'Folhas Pendentes', 'value' => '17', 'icon' => '⏳'],
    ['label' => 'Folhas Assinadas', 'value' => '162', 'icon' => '✅'],
    ['label' => 'Folhas Rejeitadas', 'value' => '5', 'icon' => '⛔'],
];

$employees = [
    ['name' => 'Mariana Costa', 'department' => 'Financeiro', 'manager' => 'Carlos Mendes', 'status' => 'Assinada', 'sheet' => 'Abril/2026'],
    ['name' => 'Rafael Souza', 'department' => 'Operações', 'manager' => 'Ana Ribeiro', 'status' => 'Pendente', 'sheet' => 'Abril/2026'],
    ['name' => 'Juliana Ferreira', 'department' => 'Comercial', 'manager' => 'Paulo Lima', 'status' => 'Em análise', 'sheet' => 'Abril/2026'],
    ['name' => 'Lucas Almeida', 'department' => 'Tecnologia', 'manager' => 'Fernanda Lopes', 'status' => 'Rejeitada', 'sheet' => 'Março/2026'],
    ['name' => 'Patrícia Gomes', 'department' => 'RH', 'manager' => 'Bianca Martins', 'status' => 'Assinada', 'sheet' => 'Abril/2026'],
];

$pendingSheets = [
    ['employee' => 'Rafael Souza', 'type' => 'Folha mensal', 'competency' => 'Abril/2026', 'manager' => 'Ana Ribeiro', 'status' => 'Pendente'],
    ['employee' => 'Juliana Ferreira', 'type' => 'Folha complementar', 'competency' => 'Abril/2026', 'manager' => 'Paulo Lima', 'status' => 'Em análise'],
    ['employee' => 'Renato Farias', 'type' => '13º adiantado', 'competency' => 'Maio/2026', 'manager' => 'Carlos Mendes', 'status' => 'Pendente'],
];

$signatureHistory = [
    ['date' => '09/05/2026', 'user' => 'Bianca Martins', 'document' => 'Folha Abril/2026', 'action' => 'Assinatura concluída', 'status' => 'Assinada'],
    ['date' => '08/05/2026', 'user' => 'Lucas Almeida', 'document' => 'Folha Março/2026', 'action' => 'Rejeição registrada', 'status' => 'Rejeitada'],
    ['date' => '07/05/2026', 'user' => 'Ana Ribeiro', 'document' => 'Folha Abril/2026', 'action' => 'Envio para análise', 'status' => 'Em análise'],
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
    <title>RH | G2G Folha de Ponto</title>
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
                <div class="flex h-10 w-10 items-center justify-center rounded-lg border border-[#d4b25a] bg-[#f7d873] text-xl">📁</div>
                <div>
                    <p class="text-sm font-semibold text-slate-800">G2G Folha de Ponto</p>
                    <p class="text-xs text-explorer-muted">Painel RH</p>
                </div>
            </div>
            <div class="p-4">
                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-[0.18em] text-explorer-muted">Navegação</p>
                <nav class="space-y-1">
                    <?php foreach ($menu as $index => $item): ?>
                        <a href="#" class="<?php echo $index === 0 ? 'border-[#bfd4ea] bg-[#e9f2fb] text-[#0f548c]' : 'border-transparent text-slate-700 hover:bg-explorer-soft'; ?> flex items-center gap-3 rounded-lg border px-3 py-2.5 text-sm font-medium transition">
                            <span class="text-base"><?php echo $index === 0 ? '🗂️' : '📁'; ?></span>
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
                        <button id="toggleSidebar" class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-explorer-line bg-white text-slate-700 lg:hidden">
                            ☰
                        </button>
                        <div>
                            <p class="text-sm font-semibold text-slate-800">Central administrativa do RH</p>
                            <p class="text-xs text-explorer-muted">Controle total de usuários, folhas e assinaturas</p>
                        </div>
                    </div>
                    <div class="hidden items-center gap-3 md:flex">
                        <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">Pesquisa global (fake)</div>
                        <a href="index.php" class="rounded-lg border border-explorer-line bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:bg-explorer-soft">Trocar perfil</a>
                    </div>
                </div>
            </header>

            <main class="p-4 sm:p-6">
                <div class="mb-6 rounded-xl border border-explorer-line bg-white shadow-sm">
                    <div class="flex flex-col gap-3 border-b border-explorer-line px-4 py-3 sm:flex-row sm:items-center sm:justify-between">
                        <div></div>
                        <div class="flex flex-wrap gap-2">
                            <button class="rounded-lg border border-explorer-line bg-white px-3 py-2 text-sm text-slate-700 hover:bg-explorer-soft">Exportar</button>
                            <button class="rounded-lg border border-[#bfd4ea] bg-[#e9f2fb] px-3 py-2 text-sm font-medium text-[#0f548c] hover:bg-[#dcedfb]">Nova folha</button>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 px-4 py-4 lg:flex-row lg:items-center lg:justify-between">
                        <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
                            <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">Departamento: Todos</div>
                            <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">Status: Todos</div>
                            <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">Competência: Abril/2026</div>
                            <div class="rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-sm text-explorer-muted">Gestor: Todos</div>
                        </div>
                        <div class="w-full max-w-md">
                            <div class="flex items-center rounded-lg border border-explorer-line bg-white px-3 py-2 shadow-sm">
                                <span class="mr-2 text-explorer-muted">🔎</span>
                                <input type="text" placeholder="Pesquisar funcionário, folha ou assinatura" class="w-full border-0 bg-transparent text-sm outline-none placeholder:text-explorer-muted">
                            </div>
                        </div>
                    </div>
                </div>

                <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
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
                            <h2 class="text-lg font-semibold text-slate-800">Funcionários cadastrados</h2>
                            <p class="text-sm text-explorer-muted">Visão consolidada com ações rápidas simuladas para o RH.</p>
                        </div>
                        <div class="flex gap-2">
                            <button class="rounded-lg border border-explorer-line bg-white px-3 py-2 text-sm text-slate-700 hover:bg-explorer-soft">Importar</button>
                            <button class="rounded-lg border border-[#bfd4ea] bg-[#e9f2fb] px-3 py-2 text-sm font-medium text-[#0f548c] hover:bg-[#dcedfb]">Novo funcionário</button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm">
                            <thead class="bg-explorer-soft text-explorer-muted">
                                <tr>
                                    <th class="px-4 py-3 font-semibold">Nome</th>
                                    <th class="px-4 py-3 font-semibold">Departamento</th>
                                    <th class="px-4 py-3 font-semibold">Gestor</th>
                                    <th class="px-4 py-3 font-semibold">Status</th>
                                    <th class="px-4 py-3 font-semibold">Última folha</th>
                                    <th class="px-4 py-3 font-semibold">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-explorer-line">
                                <?php foreach ($employees as $employee): ?>
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-4 py-3 font-medium text-slate-800"><?php echo $employee['name']; ?></td>
                                        <td class="px-4 py-3"><?php echo $employee['department']; ?></td>
                                        <td class="px-4 py-3"><?php echo $employee['manager']; ?></td>
                                        <td class="px-4 py-3"><?php echo statusBadge($employee['status']); ?></td>
                                        <td class="px-4 py-3"><?php echo $employee['sheet']; ?></td>
                                        <td class="px-4 py-3">
                                            <div class="flex flex-wrap gap-2">
                                                <button class="rounded-md border border-explorer-line bg-white px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-explorer-soft">Visualizar</button>
                                                <button class="rounded-md border border-explorer-line bg-white px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-explorer-soft">Editar</button>
                                                <button class="rounded-md border border-emerald-200 bg-emerald-50 px-2.5 py-1.5 text-xs font-medium text-emerald-700 hover:bg-emerald-100">Aprovar</button>
                                                <button class="rounded-md border border-red-200 bg-red-50 px-2.5 py-1.5 text-xs font-medium text-red-700 hover:bg-red-100">Rejeitar</button>
                                                <button class="rounded-md border border-explorer-line bg-white px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-explorer-soft">Excluir</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex flex-col gap-3 border-t border-explorer-line px-4 py-3 sm:flex-row sm:items-center sm:justify-between">
                        <p class="text-sm text-explorer-muted">Mostrando 1 a 5 de 189 funcionários</p>
                        <div class="flex items-center gap-2">
                            <button class="rounded-md border border-explorer-line bg-white px-3 py-1.5 text-sm text-slate-700 hover:bg-explorer-soft">Anterior</button>
                            <button class="rounded-md border border-[#bfd4ea] bg-[#e9f2fb] px-3 py-1.5 text-sm font-medium text-[#0f548c]">1</button>
                            <button class="rounded-md border border-explorer-line bg-white px-3 py-1.5 text-sm text-slate-700 hover:bg-explorer-soft">2</button>
                            <button class="rounded-md border border-explorer-line bg-white px-3 py-1.5 text-sm text-slate-700 hover:bg-explorer-soft">3</button>
                            <button class="rounded-md border border-explorer-line bg-white px-3 py-1.5 text-sm text-slate-700 hover:bg-explorer-soft">Próxima</button>
                        </div>
                    </div>
                </section>

                <div class="mt-6 grid gap-6 xl:grid-cols-2">
                    <section class="rounded-xl border border-explorer-line bg-white shadow-sm">
                        <div class="border-b border-explorer-line px-4 py-4">
                            <h2 class="text-lg font-semibold text-slate-800">Folhas pendentes</h2>
                            <p class="text-sm text-explorer-muted">Itens aguardando revisão, envio ou aprovação interna.</p>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm">
                                <thead class="bg-explorer-soft text-explorer-muted">
                                    <tr>
                                        <th class="px-4 py-3 font-semibold">Funcionário</th>
                                        <th class="px-4 py-3 font-semibold">Tipo</th>
                                        <th class="px-4 py-3 font-semibold">Competência</th>
                                        <th class="px-4 py-3 font-semibold">Gestor</th>
                                        <th class="px-4 py-3 font-semibold">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-explorer-line">
                                    <?php foreach ($pendingSheets as $sheet): ?>
                                        <tr class="hover:bg-slate-50">
                                            <td class="px-4 py-3 font-medium text-slate-800"><?php echo $sheet['employee']; ?></td>
                                            <td class="px-4 py-3"><?php echo $sheet['type']; ?></td>
                                            <td class="px-4 py-3"><?php echo $sheet['competency']; ?></td>
                                            <td class="px-4 py-3"><?php echo $sheet['manager']; ?></td>
                                            <td class="px-4 py-3"><?php echo statusBadge($sheet['status']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section class="rounded-xl border border-explorer-line bg-white shadow-sm">
                        <div class="border-b border-explorer-line px-4 py-4">
                            <h2 class="text-lg font-semibold text-slate-800">Histórico de assinaturas</h2>
                            <p class="text-sm text-explorer-muted">Registro visual das últimas movimentações do sistema.</p>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm">
                                <thead class="bg-explorer-soft text-explorer-muted">
                                    <tr>
                                        <th class="px-4 py-3 font-semibold">Data</th>
                                        <th class="px-4 py-3 font-semibold">Usuário</th>
                                        <th class="px-4 py-3 font-semibold">Documento</th>
                                        <th class="px-4 py-3 font-semibold">Movimento</th>
                                        <th class="px-4 py-3 font-semibold">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-explorer-line">
                                    <?php foreach ($signatureHistory as $history): ?>
                                        <tr class="hover:bg-slate-50">
                                            <td class="px-4 py-3"><?php echo $history['date']; ?></td>
                                            <td class="px-4 py-3 font-medium text-slate-800"><?php echo $history['user']; ?></td>
                                            <td class="px-4 py-3"><?php echo $history['document']; ?></td>
                                            <td class="px-4 py-3"><?php echo $history['action']; ?></td>
                                            <td class="px-4 py-3"><?php echo statusBadge($history['status']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
