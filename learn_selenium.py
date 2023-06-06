from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time


def main(email, password):

    Options = webdriver.ChromeOptions()
    Options.add_argument('--incognite')
    Options.add_argument("--disable-gpu")

    driver = webdriver.Chrome(options=Options)
    driver.execute_cdp_cmd("Network.setCacheDisabled", {"cacheDisabled":True})

    try:
        driver.get('https://id.vk.com/auth?v=1.46.0&app_id=7934655&uuid=2a0fea2a52&redirect_uri=https%3A%2F%2Fm.vk.com%2F%3Fact%3Dclient_url_proxy%26_to%3DaHR0cHM6Ly9tLnZrLmNvbS9sb2dpbg%26_proxy%3Did_auth%26_openBrowser%3D1&app_settings=W10%3D&action=eyJuYW1lIjoibm9fcGFzc3dvcmRfZmxvdyIsInBhcmFtcyI6eyJ0eXBlIjoic2lnbl9pbiIsIndpdGhfdmthcHAiOnRydWV9fQ%3D%3D&scheme=space_gray')

        WebDriverWait(driver, 5).until(EC.presence_of_element_located((By.XPATH, '//body/div/div/div/div/div/div/div/div/div/form/div/section/div/div/div/input')))

        find_element_username = driver.find_element(By.XPATH, '//body/div/div/div/div/div/div/div/div/div/form/div/section/div/div/div/input')
        find_element_username.clear()
        find_element_username.send_keys(email)

        find_next_to_password = driver.find_element(By.XPATH, "//body/div/div/div/div/div/div/div/div/div/form/div[2]/div/button")
        find_next_to_password.click()

        try:
            time.sleep(3)
            is_has = driver.find_element(By.XPATH, '//body/div/div/div/div/div/div/div/div/div/form/div/h1/div/span')
            if '2stepverification' in is_has.text.replace('-','').replace(' ','').lower():
                driver.quit()
                return '2 Step Verification', False
        except:
            pass

        try:
            WebDriverWait(driver, 5).until(EC.presence_of_element_located((By.XPATH, '//body/div/div/div/div/div/div/div/div/div/form/div/div[3]/div/div/input')))
        except:
            driver.quit()
            return 'Error While search password input', False

        try:
            find_element_password = driver.find_element(By.XPATH, '//body/div/div/div/div/div/div/div/div/div/form/div/div[3]/div/div/input')
            find_element_password.clear()
            find_element_password.send_keys(password)
        except:
            driver.quit()
            return 'Error while input password'
        
        submit_login = driver.find_element(By.XPATH, '//body/div/div/div/div/div/div/div/div/div/form/div[2]/button')
        submit_login.click()

        driver.quit()
        return 'Success', True
    except:
        driver.quit()
        return 'Unkown Error', False

main('arestovertex36@rambler.ru', 'kontolnaga')
