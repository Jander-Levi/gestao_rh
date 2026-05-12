<?php
$profiles = [
    [
        'title' => 'RH',
        'description' => 'Acesso administrativo completo para acompanhar usuários, folhas e assinaturas.',
        'icon' => '📁',
        'link' => 'hr.php',
        'button' => 'Acessar RH',
    ],
    [
        'title' => 'Gestor',
        'description' => 'Visualização da equipe, aprovação de folhas e acompanhamento de pendências.',
        'icon' => '🗂️',
        'link' => 'gestor.php',
        'button' => 'Acessar Gestor',
    ],
    [
        'title' => 'Funcionário',
        'description' => 'Área pessoal para consultar histórico, assinar folhas e baixar comprovantes.',
        'icon' => '📄',
        'link' => 'funcionario.php',
        'button' => 'Acessar Área',
    ],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G2G Payroll System</title>
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
                        explorer: '0 1px 2px rgba(15, 23, 42, 0.08), 0 8px 24px rgba(15, 23, 42, 0.04)'
                    }
                }
            }
        };
    </script>
</head>
<body class="min-h-screen bg-explorer-bg text-explorer-text">
    <div class="flex min-h-screen items-center justify-center px-4 py-10 sm:px-6">
        <div class="w-full max-w-6xl rounded-2xl border border-explorer-line bg-explorer-panel shadow-explorer">
            <div class="border-b border-explorer-line bg-gradient-to-b from-white to-explorer-soft px-6 py-5 sm:px-10">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex items-center gap-4">
                        <div class="flex h-16 w-16 items-center justify-center rounded-xl border border-[#d4b25a] bg-[#f6d66d] text-3xl shadow-sm">
                            📁
                        </div>
                        <div>
                            <p class="text-sm font-medium uppercase tracking-[0.2em] text-explorer-muted">Sistema interno</p>
                            <h1 class="text-3xl font-semibold text-slate-800">G2G Payroll System</h1>
                            <p class="mt-1 text-sm text-explorer-muted">Ambiente visual para gestão de folhas de pagamento com navegação por perfis.</p>
                        </div>
                    </div>
                    <div class="rounded-xl border border-explorer-line bg-white px-4 py-3 text-sm text-explorer-muted">
                        <p class="font-medium text-slate-700">Este Computador &gt; Disco Local (C:) &gt; xampp &gt; htdocs &gt; g2g</p>
                        <p class="mt-1">Selecione abaixo o perfil para navegar pela interface demonstrativa.</p>
                    </div>
                </div>
            </div>

            <div class="px-6 py-8 sm:px-10">
                <div class="mb-6 flex items-center justify-between rounded-xl border border-explorer-line bg-explorer-soft px-4 py-3">
                    <div>
                        <p class="text-sm font-semibold text-slate-700">Escolha de perfil</p>
                        <p class="text-sm text-explorer-muted">Cada área abre uma interface específica com dados fictícios e fluxos simulados.</p>
                    </div>
                    <div class="hidden rounded-lg border border-explorer-line bg-white px-3 py-2 text-xs font-medium text-explorer-muted md:block">
                        Visual inspirado no Windows Explorer
                    </div>
                </div>

                <div class="grid gap-6 lg:grid-cols-3">
                    <?php foreach ($profiles as $profile): ?>
                        <div class="group flex h-full flex-col rounded-2xl border border-explorer-line bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-explorer">
                            <div class="mb-5 flex h-16 w-16 items-center justify-center rounded-xl border border-[#d4b25a] bg-[#f7d873] text-3xl">
                                <?php echo $profile['icon']; ?>
                            </div>
                            <h2 class="text-xl font-semibold text-slate-800"><?php echo $profile['title']; ?></h2>
                            <p class="mt-3 flex-1 text-sm leading-6 text-explorer-muted"><?php echo $profile['description']; ?></p>
                            <div class="mt-6 flex items-center justify-between rounded-lg border border-explorer-line bg-explorer-soft px-3 py-2 text-xs text-explorer-muted">
                                <span>Pasta de trabalho</span>
                                <span class="font-medium text-slate-700"><?php echo $profile['title']; ?></span>
                            </div>
                            <a href="<?php echo $profile['link']; ?>" class="mt-6 inline-flex items-center justify-center rounded-lg border border-[#b8cce1] bg-[#e7f1fb] px-4 py-3 text-sm font-semibold text-[#0f548c] transition hover:border-[#8eb6da] hover:bg-[#d8eafb]">
                                <?php echo $profile['button']; ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
