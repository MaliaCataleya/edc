# -*- coding: utf-8 -*-
"""
Created on Mon Oct 17 06:25:01 2022

@author: SAMAUFF
"""

import fmipp
import os

work_dir = "C:\test"
fmu_name = "cs_bouncingBall.fmu"
model_name = "bouncingBall.mdl"
path_to_fmu = os.path.join(work_dir, fmu_name)
print("path fmu: ", path_to_fmu)

#uri_extracted_dir = "\\smtcf01008.rd.corpintra.net\SAMAUFF$\data\My Documents\FMU\Code\extracted_test"
#extracted_fmu = fmipp.extractFMU(path_to_fmu, uri_extracted_dir)
#print("path extracted fmu: ", extracted_fmu)

fmu = fmipp.FMUCoSimulationV1(work_dir, fmu_name, False, 1e-3)
print("fmu: ", fmu)

status = fmu.instantiate("my_test_model_1", 0., False, False)
print("status1: ", status)
 
status = fmu.initialize(0.0, True, 2.5)
print("status2: ", status)
    
time = 0
stepsize = 0.5

status = fmu.doStep(time, stepsize, True)
print("status3: ", status)
print("time_after: ", time)

yout = fmu.getRealValue("yout")
print("yout: ", yout)
