This repository contains small sample datasets and example API responses
for the TerraCore Neighborhood Intelligence API.

These files are intended for:

- testing
- schema exploration
- data prototyping
- documentation examples

The samples represent real TerraCore API responses but are limited in size.
For full data access, use the TerraCore API.

TerraCore Sample CSV Dataset

This file contains example TerraCore data for 34 census block groups in the Denver metropolitan area.

Notes:
- Some fields such as median income or median rent may appear as null. This occurs when the Census Bureau suppresses estimates due to insufficient sample size.
- TerraCore intentionally returns null rather than estimating missing values to preserve data accuracy.
- Raw counts and percentage fields are both included to support statistical analysis.
