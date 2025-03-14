<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { MoreHorizontal } from 'lucide-vue-next';

defineProps({vehicles: Object})


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Vehicles',
        href: 'vehicles',
    },
];
const formatPrice = (price) => {
    return new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    }).format(price);
};

const editVehicle = (id) => {
    router.get(route('vehicles.edit', id))
};



const deleteVehicle = (id) => {
    if (confirm('Tem certeza que deseja excluir este veículo?')) {
        alert(`Excluir veículo com ID: ${id}`);
    }
};

const getBadgeVariant = (status) => {
    const variants = {
        active: 'default',
        inactive: 'destructive',
        in_maintenance: 'secondary',
        in_route: 'outline'
    };

    return variants[status] || 'default';
}

const getTextStatus = (status) => {
    const variants = {
        active: 'Ativo',
        inactive: 'Inativo',
        in_maintenance: 'Em manutenção',
        in_route: 'Em rota'
    };

    return variants [status] || 'Sem Informações'
}

</script>
<template>
    <Head title="Vehicles" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Veículos</h1>
                    <Button @click="router.get(route('vehicles.create'))">Adicionar Veículo</Button>
                </div>

                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>Modelo</TableHead>
                            <TableHead>Marca</TableHead>
                            <TableHead>Ano</TableHead>
                            <TableHead>Cor</TableHead>
                            <TableHead>Preço</TableHead>
                            <TableHead>Status</TableHead>
                            <TableHead>Manutenção</TableHead>
                            <TableHead>Ações</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="vehicle in vehicles" :key="vehicle.id">
                            <TableCell>{{ vehicle.model }}</TableCell>
                            <TableCell>{{ vehicle.brand }}</TableCell>
                            <TableCell>{{ vehicle.year }}</TableCell>
                            <TableCell>
                                <div class="w-4 h-4 rounded-full" :style="{ backgroundColor: vehicle.color }"></div>
                            </TableCell>
                            <TableCell>{{ formatPrice(vehicle.price) }}</TableCell>
                            <TableCell>
                                <Badge :variant="getBadgeVariant(vehicle.status)">
                                    {{ getTextStatus(vehicle.status) }}
                                </Badge>
                            </TableCell>
                            <TableCell>
                                <Badge :variant="active" v-if="vehicle.maintenance_last_6_months">
                                    Em dia
                                </Badge>
                                <Badge variant="destructive" v-else>
                                    Atrasada
                                </Badge>
                            </TableCell>
                            <TableCell>
                                <DropdownMenu>
                                    <DropdownMenuTrigger as-child>
                                        <Button variant="ghost" size="sm">
                                            <MoreHorizontal class="h-4 w-4" />
                                        </Button>
                                    </DropdownMenuTrigger>
                                    <DropdownMenuContent>
                                        <DropdownMenuItem @click="editVehicle(vehicle.id)">
                                            Editar
                                        </DropdownMenuItem>
                                        <DropdownMenuItem @click="deleteVehicle(vehicle.id)">
                                            Excluir
                                        </DropdownMenuItem>
                                    </DropdownMenuContent>
                                </DropdownMenu>
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
