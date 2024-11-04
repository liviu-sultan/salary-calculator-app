
## Income Tax Calculator

Income tax is calculated according to tax bands. Tax within each band is
calculated based on the amount of the salary falling within a band. The total tax is
the sum of the tax paid within all bands. Each band has an optional upper and
mandatory lower limit and a percentage rate of tax. Tax bands will not overlap.
Each band takes its upper limit to be the lower limit of the next band. The tax band
covering the upper part of the salary never has an upper limit. The uppermost tax band has a tax rate of 40%; this allows tax to be capped.


## Deploy Application
To deploy the application you must have docker installed on your computer and "make". 
Then go to the project root and run following command: "make deploy"
In order to access the application in browser, you need to visit http://localhost:8081/salary
