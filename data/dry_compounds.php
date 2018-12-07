<?php
namespace AquaTx;

// compound
//   elements = concencentration by mass (ppm)
//   tsp = teaspoon (rounded to 5mL to avoid confusion) concentrations in milligrams
//   sol = maximum solubility in terms of mg/mL (at 20ºC?)
//   target = most useful macro or micronutrient for our users

return [
    'KNO3' => [
        'tsp' => 5200,
        'sol' => 360,
        'target' => 'NO3',
        'elements' => [
            'NO3' => 0.6133,
            'N' => 0.138539,
            'K' => 0.3867,
        ],
    ],
    'K2HPO4' => [
        'tsp' => 5800,
        'sol' => 1492,
        'target' => 'PO4',
        'elements' => [
            'PO4' => 0.545271861,
            'P' => 0.177837745,
            'K' => 0.448963656,
        ],
    ],
    'KH2PO4' => [
        'tsp' => 5600,
        'sol' => 220,
        'target' => 'PO4',
        'elements' => [
            'PO4' => 0.6979,
            'P' => 0.227605,
            'K' => 0.2873,
        ],
    ],
    'K3PO4' => [
        'tsp' => 6000,
        'sol' => 900,
        'target' => 'PO4',
        'elements' => [
            'PO4' => 0.447416,
            'P' => 0.145925,
            'K' => 0.552596,
        ],
    ],
    'KCl' => [
        'tsp' => 4500,
        'sol' => 344,
        'target' => 'K',
        'elements' => [
            'K' => 0.524447,
            'Cl' => 0.18401,
        ],
    ],
    'K2SO4' => [
        'tsp' => 6400,
        'sol' => 120,
        'target' => 'K',
        'elements' => [
            'K' => 0.448736,
            'S' => 0.18401,
        ],
    ],
    'Seachem Equilibrium' => [
        'tsp' => 5333,
        'target' => 'K',
        'elements' => [
            'K' => 0.195,
            'Ca' => 0.0806,
            'Mg' => 0.0241,
            'Fe' => 0.0011,
            'Mn' => 0.0006,
        ],
    ],
    'CaCl2.2H2O' => [
        'tsp' => 3600,
        'sol' => 745,
        'target' => 'Ca',
        'elements' => [
            'Ca' => 0.27262091014216722,
            'Cl' => 0.4823209305489423,
        ],
    ],
    'CaSO4.1/2H2O' => [
        'tsp' => 3100,
        'sol' => 2.1,
        'target' => 'Ca',
        'elements' => [
            'Ca' => 0.2943881298663141,
            'S' => 0.2355369472601734,
        ],
    ],
    'CaSO4.2H2O' => [
        'tsp' => 3100,
        'sol' => 2.4,
        'target' => 'Ca',
        'elements' => [
            'Ca' => 0.2327815531161062,
            'S' => 0.18624615205901147,
        ],
    ],
    'CaMg(CO3)2' => [
        'tsp' => 14150,
        'target' => 'Ca',
        'elements' => [
            'Ca' => 0.2173,
            'Mg' => 0.1318,
        ],
    ],
    'Ca(NO3)2.4H2O' => [
        'tsp' => 12520,
        'sol' => 121,
        'target' => 'Ca',
        'elements' => [
            'Ca' => 0.16971416472580987,
            'NO3' => 0.525089985,
        ],
    ],
    '5Ca(NO3)2.NH4NO3.10H2O' => [
        'tsp' => 9480,
        'sol' => 271,
        'target' => 'Ca',
        'comments' => 'N as NH4 and NO3',
        'elements' => [
            'Ca' => 0.18543984009179916,
            'N' => 0.1555440395328608,
        ],
    ],
    'MgSO4.7H2O' => [
        'tsp' => 5100,
        'sol' => 710,
        'target' => 'Mg',
        'elements' => [
            'Mg' => 0.0986124,
            'S' => 0.130101,
        ],
    ],
    'Mg(NO3)2.6H2O' => [
        'tsp' => 7320,
        'sol' => 1250,
        'target' => 'NO3',
        'elements' => [
            'Mg' => 0.0947932,
            'NO3' => 0.483650546,
            'N' => 0.109258,
        ],
    ],
    'AF\'s MacroMicro Mix' => [
        'tsp' => 5250,
        'target' => 'NO3',
        'elements' => [
            'K' => 0.233,
            'N' => 0.0343,
            'NO3' => 0.152,
            'S' => 0.0877,
            'Mg' => 0.0268,
            'Fe' => 0.0134,
            'Mn' => 0.00383,
            'Mo' => 0.000102,
            'Cu' => 0.000184,
            'Zn' => 0.000758,
        ],
    ],
    'PlantedTanksUK Trace' => [
        'tsp' => 6000,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.084,
            'Mn' => 0.0182,
            'Zn' => 0.0116,
            'B' => 0.0105,
            'Mo' => 0.0015,
            'Cu' => 0.0023,
        ],
    ],
    'Plantex CSM+B' => [
        'tsp' => 4300,
        'sol' => 170,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.0653,
            'Mn' => 0.0187,
            'Cu' => 0.0009,
            'Mg' => 0.014,
            'Zn' => 0.0037,
            'Mo' => 0.0005,
            'B' => 0.008,
        ],
    ],
    'Miller\'s MicroPlex' => [
        'tsp' => 3720,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.04,
            'Mn' => 0.04,
            'Mg' => 0.0543,
            'Zn' => 0.014,
            'Mo' => 0.001,
            'B' => 0.005,
            'Co' => 0.0005,
            'Cu' => 0.015,
        ],
    ],
    'Plant-Prod Chelated' => [
        'tsp' => 4480,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.07,
            'Fe as EDTA' => 0.05,
            'Fe as DTPA' => 0.02,
            'Mn' => 0.02,
            'Zn' => 0.004,
            'Cu' => 0.001,
        ],
    ],
    'CIFO MIKROM' => [
        'tsp' => 5170,
        'target' => 'Fe',
        'elements' => [
            'Mg' => 0.0181,
            'B' => 0.005,
            'Cu' => 0.005,
            'Zn' => 0.01,
            'Mn' => 0.04,
            'Mo' => 0.002,
            'SO3' => 0.06,
            'Fe' => 0.04,
        ],
    ],
    'Dutch Nutrient Formula' => [
        'tsp' => 3600,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.07,
            'B' => 0.013,
            'Mn' => 0.02,
            'Zn' => 0.004,
            'Cu' => 0.001,
            'Mo' => 0.006,
        ],
    ],
    'Rexolin APN' => [
        'tsp' => 3300,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.06,
            'Mn' => 0.024,
            'Cu' => 0.0025,
            'Mo' => 0.0025,
            'Zn' => 0.013,
            'B' => 0.011,
        ],
    ],
    'Rexolin BRA' => [
        'tsp' => 3500,
        'sol' => 200,
        'target' => 'Fe',
        'elements' => [
            'K' => 0.0963,
            'Fe' => 0.0266,
            'S' => 0.0128,
            'Mg' => 0.0086,
            'B' => 0.021,
            'Cu' => 0.0036,
            'Mn' => 0.0248,
            'Zn' => 0.0338,
        ],
    ],
    'Fe Gluconate (12.46%)' => [
        'tsp' => 2440,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.1246,
        ],
    ],
    'DTPA Fe (11%)' => [
        'tsp' => 3870,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.11,
        ],
    ],
    'DTPA Fe (10%)' => [
        'tsp' => 4290,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.1,
        ],
    ],
    'DTPA Fe (7%)' => [
        'tsp' => 4290,
        'target' => 'Fe',
        'sol' => 150,
        'elements' => [
            'Fe' => 0.07,
        ],
    ],
    'EDTA Fe (13%)' => [
        'tsp' => 5100,
        'sol' => 90,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.130,
        ],
    ],
    'EDDHA Fe (6%)' => [
        'tsp' => 2420,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.06,
        ],
    ],
    'MnSO4.H2O' => [
        'tsp' => 7490,
        'sol' => 393,
        'target' => 'Mn',
        'elements' => [
            'Mn' => 0.32503845698733876,
            'S' => 0.18971719323157025,
        ],
    ],
    'Aquagreen\'s Amgrow Trace Mix' => [
        'tsp' => 4500,
        'target' => 'Fe',
        'elements' => [
            'Fe' => 0.075,
            'Mn' => 0.037,
            'Zn' => 0.006,
            'B' => 0.007,
            'Mo' => 0.002,
            'Cu' => 0.003,
        ],
    ],
    'Baking Soda' => [
        'tsp' => 4655,
        'target' => 'HCO3',
        'elements' => [
            'HCO3' => 0.726334272,
            'Na' => 0.273665728,
        ],
    ],
];
