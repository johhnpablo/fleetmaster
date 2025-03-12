<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
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

const vehicles = ref([
    {
        id: 1,
        model: 'Civic',
        brand: 'Honda',
        year: 2020,
        color: '#808080', // Cinza
        price: 95000.00,
        status: 'ativo',
    },
    {
        id: 2,
        model: 'Corolla',
        brand: 'Toyota',
        year: 2019,
        color: '#0000FF', // Azul
        price: 90000.00,
        status: 'inativo',
    },
    {
        id: 3,
        model: 'Golf',
        brand: 'Volkswagen',
        year: 2021,
        color: '#FF0000', // Vermelho
        price: 85000.00,
        status: 'em_manutenção',
    },
]);

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
    alert(`Editar veículo com ID: ${id}`);
};

const deleteVehicle = (id) => {
    if (confirm('Tem certeza que deseja excluir este veículo?')) {
        alert(`Excluir veículo com ID: ${id}`);
    }
};
</script>
<template>
    <Head title="Vehicles" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Veículos</h1>
                    <Button>Adicionar Veículo</Button>
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
                                <Badge :variant="vehicle.status === 'ativo' ? 'default' : 'secondary'">
                                    {{ vehicle.status }}
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
