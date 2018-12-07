<?php
namespace AquaTx;

// nutrient
//   method (EI = Tom Barr's Estimative Index, PPS = Edward's Perpetual Preservation System, Walstad = Diana Walstad's Natural Aquariums, PMDD = Poor Man's Dupla Drops)
//     method: recommended ppm by author
//     low and high ppm (or +/- 20% if author uses exact value) for given nutrient
//     margin: high - low

return [
    'EI' => [
        'NO3' => [
            'method' => 7.5,
            'low' => 5,
            'high' => 30,
            'margin' => 25,
        ],
        'PO4' => [
            'method' => 1.3,
            'low' => 1,
            'high' => 3,
            'margin' => 2,
        ],
        'K' => [
            'method' => 7.5,
            'low' => 10,
            'high' => 30,
            'margin' => 20,
        ],
        'Ca' => [
            'method' => 15,
            'low' => 15,
            'high' => 30,
            'margin' => 15,
        ],
        'Mg' => [
            'method' => 5,
            'low' => 5,
            'high' => 10,
            'margin' => 5,
        ],
        'Fe' => [
            'method' => 0.5,
            'low' => 0.1,
            'high' => 1,
            'margin' => 0.9,
        ],
        'Mn' => [
            'method' => 0.1,
            'low' => 0.1,
            'high' => 0.5,
            'margin' => 0.4,
        ],
    ],
    'PPS' => [
        'NO3' => [
            'method' => 1,
            'low' => 5,
            'high' => 10,
            'margin' => 9,
        ],
        'PO4' => [
            'method' => 0.1,
            'low' => 0.1,
            'high' => 1,
            'margin' => 0.9,
        ],
        'K' => [
            'method' => 1.33,
            'low' => 1,
            'high' => 20,
            'margin' => 15,
        ],
        'Ca' => [
            'method' => 0.4,
            'low' => 20,
            'high' => 30,
            'margin' => 10,
        ],
        'Mg' => [
            'method' => 0.1,
            'low' => 2,
            'high' => 5,
            'margin' => 3,
        ],
        'Fe' => [
            'method' => 0.1,
            'low' => 0.01,
            'high' => 0.1,
            'margin' => 0.09,
        ],
        'Mn' => [
            'method' => 0.1,
            'low' => 0.01,
            'high' => 0.1,
            'margin' => 0.09,
        ],
    ],
    'Walstad' => [
        'NO3' => [
            'low' => 0.443,
            'high' => 0.553,
            'margin' => 0.11,
        ],
        'PO4' => [
            'low' => 0.061,
            'high' => 0.073,
            'margin' => 0.012,
        ],
        'K' => [
            'low' => 2,
            'margin' => 0.4,
            'high' => 2.4,
        ],
        'Ca' => [
            'low' => 28,
            'high' => 34,
            'margin' => 6,
        ],
        'Mg' => [
            'low' => 2,
            'high' => 2.4,
            'margin' => 0.4,
        ],
        'Fe' => [
            'low' => 0.06,
            'high' => 0.072,
            'margin' => 0.012,
        ],
        'Mn' => [
            'low' => 0.06,
            'margin' => 0.012,
            'high' => 0.072,
        ],
    ],
    'PMDD' => [
        'NO3' => [
            'method' => 1.4,
            'low' => 1,
            'high' => 5,
            'margin' => 4,
        ],
        'PO4' => [
            'method' => 0,
            'low' => 0,
            'high' => 0,
            'margin' => 0,
        ],
        'K' => [
            'method' => 3,
            'low' => 2.4,
            'high' => 3.6,
            'margin' => 1.2,
        ],
        'Ca' => [
            'method' => 0,
            'low' => 0,
            'high' => 0,
            'margin' => 0,
        ],
        'Mg' => [
            'method' => 0.2,
            'low' => 0.16,
            'high' => 0.24,
            'margin' => 0.08,
        ],
        'Fe' => [
            'method' => 0.1,
            'low' => 0.08,
            'high' => 0.12,
            'margin' => 0.04,
        ],
        'Mn' => [
            'method' => 0.029,
            'low' => 0.023,
            'high' => 0.035,
            'margin' => 0.012,
        ],
    ],
    'Wet' => [
        'NO3' => [
            'method' => 3,
            'low' => 1,
            'high' => 30,
            'margin' => 29,
        ],
        'PO4' => [
            'method' => 1,
            'low' => 1,
            'high' => 5,
            'margin' => 4,
        ],
        'K' => [
            'method' => 3,
            'low' => 1,
            'high' => 20,
            'margin' => 19,
        ],
        'Ca' => [
            'method' => 2,
            'low' => 0,
            'high' => 0,
            'margin' => 0,
        ],
        'Mg' => [
            'method' => 0.5,
            'low' => 0,
            'high' => 0,
            'margin' => 0,
        ],
        'Fe' => [
            'method' => 0.2,
            'high' => 0.5,
            'low' => 0.1,
            'margin' => 0.4,
        ],
        'Mn' => [
            'method' => 0.2,
            'high' => 0.5,
            'low' => 0.1,
            'margin' => 0.4,
        ],
    ],
    'EI_low' => [
        'NO3' => [
            'method' => 10,
        ],
        'PO4' => [
            'method' => 1,
        ],
        'K' => [
            'method' => 10,
        ],
        'Ca' => [
            'method' => 15,
        ],
        'Mg' => [
            'method' => 5,
        ],
        'Fe' => [
            'method' => 0.2,
        ],
        'Mn' => [
            'method' => 0.1,
        ],
    ],
    'EI_daily' => [
        'NO3' => [
            'method' => 3.2,
        ],
        'PO4' => [
            'method' => 0.6,
        ],
        'K' => [
            'method' => 3.2,
        ],
        'Ca' => [
            'method' => 6.4,
        ],
        'Mg' => [
            'method' => 2,
        ],
        'Fe' => [
            'method' => 0.2,
        ],
        'Mn' => [
            'method' => 0.04,
        ],
    ],
];
