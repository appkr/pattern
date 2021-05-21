package study.mediator2;

import static java.util.Arrays.asList;

public class App {

  public static void main(String[] args) {
    VideoPlayer videoPlayer = new VideoPlayer();
    MediaController mediaController = new MediaController();
    TitleUI titleUI = new TitleUI();

    VideoMediator videoMediator = new VideoMediator(videoPlayer, mediaController, titleUI);
    mediaController.setVideoMediator(videoMediator);
    videoPlayer.setVideoMediator(videoMediator);

    VideoListUI videoListUI = new VideoListUI(videoMediator,
        asList(new VideoInfo("미션임파서블"), new VideoInfo("본콜렉터")));

    // series of User Actions
    videoListUI.onSelectedItem(0);
    sleep(1);
    mediaController.onPressPauseButton();
    sleep(1);
    mediaController.onPressPlayButton();
    sleep(1);
    mediaController.onMoveProgressBar(30);
    sleep(1);
    mediaController.onPressNextButton(videoListUI);
    sleep(1);
    videoPlayer.toggle();
    sleep(1);
    videoPlayer.toggle();
    sleep(1);
    mediaController.onPressPrevButton(videoListUI);
  }

  static void sleep(int sec) {
    try {
      Thread.sleep(sec * 1_000);
    } catch (InterruptedException e) {}
  }
}
