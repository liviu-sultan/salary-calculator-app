
## Income Tax Calculator

Income tax is calculated according to tax bands. Tax within each band is
calculated based on the amount of the salary falling within a band. The total tax is
the sum of the tax paid within all bands. Each band has an optional upper and
mandatory lower limit and a percentage rate of tax. Tax bands will not overlap.
Each band takes its upper limit to be the lower limit of the next band. The tax band
covering the upper part of the salary never has an upper limit. The uppermost tax band has a tax rate of 40%; this allows tax to be capped.


## App logic

I have used Strategy and Factory design patterns for calculating the income tax of a given gross annual salary.
Also I have used bootstrap for UI and created a database populated with the given bands.

## Start Project
To start the project you must run following command: "make deploy"
