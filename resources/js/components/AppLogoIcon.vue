<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { Truck } from 'lucide-vue-next';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <Truck :class="className" v-bind="$attrs" />
</template>
