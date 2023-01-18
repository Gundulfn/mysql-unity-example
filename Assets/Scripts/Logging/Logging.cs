using UnityEngine;
using UnityEngine.Networking;
using System.Threading.Tasks;
using TMPro;

public class Logging : MonoBehaviour
{
    [SerializeField]
    private TMP_InputField usernameInputField;
    
    [SerializeField]
    private TMP_InputField passwordInputField;

    private const string REGISTER_URL = "http://localhost:8888/example_db/register.php";
    private const string LOGIN_URL = "http://localhost:8888/example_db/login.php";
    private const string SAVE_DATA_URL = "http://localhost:8888/example_db/saveData.php";

    public async void SignIn()
    {
        WWWForm form = new WWWForm();

        form.AddField("username", usernameInputField.text);
        form.AddField("password", passwordInputField.text);
        
        using(var www = UnityWebRequest.Post(LOGIN_URL, form))
        {
            www.SendWebRequest();
            
            while(!www.isDone)
                await Task.Yield();

            if (www.result != UnityWebRequest.Result.Success)
            {
                Debug.Log(www.error);
            }
            else
            {
                Debug.Log($"result: {www.downloadHandler.text}"); // print score of 'username' on Editor console
            }
        }
    }

    public async void SignUp()
    {
        WWWForm form = new WWWForm();

        form.AddField("username", usernameInputField.text);
        form.AddField("password", passwordInputField.text);

        using(var www = UnityWebRequest.Post(REGISTER_URL, form))
        {
            www.SendWebRequest();
            
            while(!www.isDone)
                await Task.Yield();

            if (www.result != UnityWebRequest.Result.Success)
            {
                Debug.Log(www.error);
            }
            else
            {
                Debug.Log("Player is created!");
            }
        }
    }

    public async void SaveScore()
    {
        int randomScore = Random.Range(0, 100);
        Debug.Log("New Score: " + randomScore);
        WWWForm form = new WWWForm();

        form.AddField("username", usernameInputField.text);
        form.AddField("score", randomScore);

        using(var www = UnityWebRequest.Post(SAVE_DATA_URL, form))
        {
            www.SendWebRequest();
            
            while(!www.isDone)
                await Task.Yield();

            if (www.result != UnityWebRequest.Result.Success)
            {
                Debug.Log(www.error);
            }
            else
            {
                Debug.Log("Score is saved!");
            }
        }
    }
}